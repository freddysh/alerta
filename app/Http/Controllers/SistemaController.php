<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Planta;
use App\Sistema;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $sistemas=Sistema::all();
        return view('admin.sistema.index',compact('sistemas'));
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
        return view('admin.sistema.create',compact('plantas'));
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
        $nombre=$request->input('nombre');
        $existe_nombre=Sistema::where('nombre',$nombre)->count();
        if($existe_nombre>0)
            return redirect()->back()->withInput($request->all())->with(['warning'=>'El sistema ya existe.']);
        $oSistema = new Sistema();
        $oSistema->nombre=$nombre;
        $oSistema->planta_id=$planta_id;
        $oSistema->save();
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
        $sistema=Sistema::findOrfail($id);
        return view('admin.sistema.edit',compact('plantas','sistema','id'));
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
        $nombre=$request->input('nombre');
        $oPlanta = Sistema::findOrfail($id);
        $oPlanta->nombre=$nombre;
        $oPlanta->planta_id=$planta_id;
        $oPlanta->save();
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
         $existeSistemaEquipo=Equipo::where('sistema_id',$id)->get();
         if($existeSistemaEquipo->count()>0){
             return response()->json([
                 'codigo' => '2',
                 'mensaje' => 'El sistema esta siendo usado en registros de equipo, primero borre los registros asociados.'
             ]);
         }
         $oSistema=Sistema::findOrfail($id);
         $rpt=$oSistema->delete();
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
}
