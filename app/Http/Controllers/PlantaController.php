<?php

namespace App\Http\Controllers;

use App\Planta;
use App\Sistema;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plantas=Planta::all();
        return view('admin.planta.index',compact('plantas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.planta.create');
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
        $nombre=$request->input('nombre');
        $existe_nombre=Planta::where('nombre',$nombre)->count();
        if($existe_nombre>0)
            return redirect()->back()->withInput($request->all())->with(['warning'=>'La planta ya existe.']);
        $oPlanta = new Planta();
        $oPlanta->nombre=$nombre;
        $oPlanta->save();
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
        $planta=Planta::findOrFail($id);
        return view('admin.planta.edit',compact('planta','id'));
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

        $nombre=$request->input('nombre');
        $oPlanta = Planta::findOrfail($id);
        $oPlanta->nombre=$nombre;
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
        $existePlantaSistema=Sistema::where('planta_id',$id)->get();
        if($existePlantaSistema->count()>0){
            return response()->json([
                'codigo' => '2',
                'mensaje' => 'La planta esta siendo usado en registros de sistema, primero borre los registros asociados.'
            ]);
        }
        $oPlanta=Planta::findOrfail($id);
        $rpt=$oPlanta->delete();
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
