<?php

namespace App\Http\Controllers;

use App\componente;
use App\Equipo;
use App\Planta;
use App\Sistema;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipos=Equipo::all();
        $plantas=Planta::get();
        $sistemas=Sistema::get();
        return view('admin.equipo.index',compact('equipos','plantas','sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $plantas=Planta::all();
        $planta=Planta::all()->first();
        $sistemas=Sistema::where('planta_id',$planta->id)->get();
        return view('admin.equipo.create',compact('plantas','sistemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $planta_id=$request->input('planta_id');
        $sistema_id=$request->input('sistema_id');
        $nombre=$request->input('nombre');
        $existe_nombre=Equipo::where('planta_id',$planta_id)
                        ->where('sistema_id',$sistema_id)->where('nombre',$nombre)->count();
        if($existe_nombre>0)
            return redirect()->back()->withInput($request->all())->with(['warning'=>'El equipo ya existe.']);
        $oEquipo = new Equipo();
        $oEquipo->nombre=$nombre;
        $oEquipo->sistema_id=$sistema_id;
        $oEquipo->planta_id=$planta_id;
        $oEquipo->save();
        return redirect()->back()->with(['success'=>'Datos guardados correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $plantas=Planta::all();
        $sistemas=Sistema::all();
        $equipo=Equipo::findOrfail($id);
        return view('admin.equipo.edit',compact('plantas','sistemas','equipo','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $planta_id=$request->input('planta_id');
        $sistema_id=$request->input('sistema_id');
        $nombre=$request->input('nombre');
        $oEquipo = Equipo::findOrfail($id);
        $oEquipo->nombre=$nombre;
        $oEquipo->sistema_id=$sistema_id;
        $oEquipo->planta_id=$planta_id;
        $oEquipo->save();
        return redirect()->back()->with(['success'=>'Datos guardados correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // preguntamos si existe en otras tablas
         $existeComponenteEquipo=componente::where('equipo_id',$id)->get();
         if($existeComponenteEquipo->count()>0){
             return response()->json([
                 'codigo' => '2',
                 'mensaje' => 'El equipo esta siendo usado en registros de componente, primero borre los registros asociados.'
             ]);
         }

         $oEquipo=Equipo::findOrfail($id);
         $rpt=$oEquipo->delete();
         if($rpt==1){
             return response()->json([
                 'codigo' => '1',
                 'mensaje' => 'Datos borrados correctamente.'
             ]);
         }else{
             return response()->json([
                 'codigo' => '0',
                 'mensaje' => 'Error al borrar los datos.'
             ]);
         }
    }
    public function mostrar_equipos(Request $request){
        $sistema_id=$request->sistema_id;
        if($request->ajax()){
            $equipos =Equipo::where('sistema_id',$sistema_id)->get();
            $data = view('admin.equipo.mostrar-equipos-ajax',compact('equipos'))->render();
            return \Response::json(['options'=>$data]);
        }
    }
}
