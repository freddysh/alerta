<?php

namespace App\Http\Controllers;

use App\Componente;
use App\Equipo;
use App\Lectura;
use App\Planta;
use App\Sistema;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Lecturacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.lectura.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $rango_lectura=$request->input('rango_lectura');
        $ir=$request->input('ir');
        $is=$request->input('is');
        $it=$request->input('it');
        $ruidos=$request->input('ruidos');
        $temperatura=$request->input('temperatura');
        $fecha=Carbon::now();

        if(!is_numeric($ir)){
            if(strlen(intval($ir))>3){
                return redirect()->back()->withInput($request->all())->with(['warning'=>'el numero no puede tener mas de 3 enteros']);
            }
        }

        if(!is_numeric($is)){
            if(strlen(intval($is))>3){
                return redirect()->back()->withInput($request->all())->with(['warning'=>'el numero no puede tener mas de 3 enteros']);
            }
        }

        if(!is_numeric($it)){
            if(strlen(intval($it))>3){
                return redirect()->back()->withInput($request->all())->with(['warning'=>'el numero no puede tener mas de 3 enteros']);
            }
        }
        $lectura=new Lectura();
        $lectura->fecha_lectura=$fecha->toDateTimeString();
        $lectura->i_r=$ir;
        $lectura->i_s=$is;
        $lectura->i_t=$it;
        $lectura->ruidos=$ruidos;
        $lectura->temperatura_menor_a=$temperatura;
        $lectura->rango_lectura=$rango_lectura;
        $lectura->anio=$fecha->year;
        $lectura->componente_id=$id;
        $lectura->autor_user_id=1;
        // $lectura->autor_user_id=Auth::user()->id;
        $lectura->save();

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
        // $id=base64_decode($id);
        $componente=Componente::findOrFail($id);
        $equipo=Equipo::where('id',$componente->equipo_id)->first();
        $sistema=Sistema::where('id',$equipo->sistema_id)->first();
        $planta=Planta::where('id',$sistema->planta_id)->first();
        $lecturas=Lectura::where('componente_id',$id)->get();
        //  $lava = new Lavacharts;
        $temperatures = \Lava::DataTable();

        $temperatures->addDateColumn('Fecha')
                    ->addNumberColumn('IR')
                    ->addNumberColumn('IS')
                    ->addNumberColumn('IT')
                    ->setTimezone('America/Lima');

        foreach($lecturas as $lectura){
            $fecha=$lectura->anio.'-'.explode('-',$lectura->rango_lectura)[1].'-01';
            $temperatures->addRow([$fecha,  $lectura->i_r, $lectura->i_s, $lectura->i_t]);
        }

                    // ->addRow(['2017-10-01',  168, 165, 161])
                    // ->addRow(['2018-04-01',  168, 162, 155])
                    // ->addRow(['2018-10-01',  172, 162, 152])
                    // ->addRow(['2019-04-01',  161, 154, 147])
                    // ->addRow(['2019-10-01',  161, 154, 147]);

        \Lava::LineChart('Temps', $temperatures, [
            'title' => 'Todas las lecturas',
            'animation' => [
                'startup' => true,
                'easing' => 'inAndOut'
            ]
        ]);
        return view('admin.lectura.show',compact('componente','equipo','sistema','planta','lecturas','id'));

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
    public function buscar(Request $request)
    {
        //
        $codigo=$request->input('codigo');
        $componente=Componente::where('nombre',$codigo)->first();
        if($componente->count()>0)
            return redirect()->route('lectura.mostrar',$componente->id);
        else
            return redirect()->back()->withInput($request->all())->with(['warning'=>'No existe un componenete con el codigo ingresado']);

    }
}
