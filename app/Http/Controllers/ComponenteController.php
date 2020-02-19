<?php

namespace App\Http\Controllers;

use App\Componente;
use App\Equipo;
use App\Exports\ComponenteExport;
use Maatwebsite\Excel\facades\Excel;
use App\Planta;
use App\Sistema;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;

class ComponenteController extends Controller
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
        $componentes=Componente::get();
        return view('admin.componente.index',compact('equipos','plantas','sistemas','componentes'));
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
        $sistema=Sistema::where('planta_id',$planta->id)->get()->first();
        $equipos=Equipo::where('sistema_id',$sistema->id)->get();
        return view('admin.componente.create',compact('plantas','sistemas','equipos'));
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
        $equipo_id=$request->input('equipo_id');
        $nombre=$request->input('nombre');
        $codigo_parte=$request->input('codigo_parte');
        $codigo_componente=$request->input('codigo_componente');
        $acometida_alimentador=$request->input('acometida_alimentador');
        $primera_lectura=$request->input('primera_lectura');
        $segunda_lectura=$request->input('segunda_lectura');
        $existe_nombre=Componente::where('planta_id',$planta_id)
                        ->where('sistema_id',$sistema_id)
                        ->where('equipo_id',$equipo_id)->where('nombre',$nombre)->count();
        if($existe_nombre>0)
            return redirect()->back()->withInput($request->all())->with(['warning'=>'El componente ya existe.']);
        $oEquipo = new Componente();
        $oEquipo->nombre=$nombre;
        $oEquipo->codigo_parte=$codigo_parte;
        $oEquipo->codigo_componente=$codigo_componente;
        $oEquipo->acometida_alimentador=$acometida_alimentador;
        $oEquipo->primera_lectura=$primera_lectura;
        $oEquipo->segunda_lectura=$segunda_lectura;
        $oEquipo->equipo_id=$equipo_id;
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
        $equipos=Equipo::all();
        $componente=Componente::findOrfail($id);
        return view('admin.componente.edit',compact('plantas','sistemas','equipos','componente','id'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export($id)
    {
        //
        $plantas=Planta::all();
        $sistemas=Sistema::all();
        $equipos=Equipo::all();
        $componente=Componente::findOrfail($id);
        // return view('admin.componente.edit',compact('plantas','sistemas','equipos','componente','id'));
        // return (new ComponenteExport($plantas,$sistemas,$equipos,$componente,$id))->download('products.pdf', \Maatwebsite\Excel\Excel::MPDF);

        $pdf = \PDF::loadView('admin.componente.export',compact('plantas','sistemas','equipos','componente','id'));
        return $pdf->download('invoice.pdf');
    }
}
