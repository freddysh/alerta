@php
    function fecha_peru($fecha){
        $valores=explode(' ',$fecha);
        $fecha=explode('-',$valores[0]);
        return $fecha[2].'-'.$fecha[1].'-'.$fecha[0].' '.$valores[1];
    }
@endphp
@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Sistema</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Lectura</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header"><h3>LECTURAS DEL COMPONENTE</h3></div>
        <div class="card-body">
                <div class="row">
                    <div class="col-lg-10 col-md-6 col-md-10">
                        <h3>1 DATOS GENERALES</h3>
                    </div>
                    <div class="col-lg-2 col-md-6 col-md-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-clipboard"></i> Nueva lectura
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('lectura.store',$componente->id) }}" method="post">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">NUEVA LECTURA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row text-left">
                                                <div class="col-lg-4 col-md-6 col-sm-12"><b>PLANTA</b>:{{ $planta->nombre }}</div>
                                                <div class="col-lg-4 col-md-6 col-sm-12"><b>SISTEMA</b>:{{ $sistema->nombre }}</div>
                                                <div class="col-lg-4 col-md-6 col-sm-12"><b>EQUIPO</b>:{{ $equipo->nombre }}</div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        @php
                                                            $ultimo_rango='';
                                                            $current_rango='';
                                                        @endphp
                                                        @if ($lecturas->sortByDesc('id')->first()->rango_lectura)
                                                            @php
                                                                $ultimo_rango=$lecturas->sortByDesc('id')->first()->rango_lectura;
                                                                if($ultimo_rango==$componente->primera_lectura){
                                                                    $current_rango=$componente->segunda_lectura;
                                                                }
                                                                else{
                                                                    $current_rango=$componente->primera_lectura;
                                                                }
                                                            @endphp
                                                        @else
                                                            @php
                                                                $current_rango=$componente->primera_lectura;
                                                            @endphp
                                                        @endif
                                                        <div class="col-lg-4 col-md-12 col-sm-12"><b>Componente</b>:{{ $componente->nombre }}</div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12"><b>Codigo de parte</b>:{{ $componente->codigo_parte }}</div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12"><b>Codigo de componente</b>:{{ $componente->codigo_componente }}</div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12"><b>Acometida</b>:{{ $componente->acometida_alimentador }}</div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12"><b>Rango de 1ra lectura</b>:[{{ $componente->primera_lectura }}]</div>
                                                        <div class="col-lg-4 col-md-12 col-sm-12"><b>Rango de 2da lectura</b>:[{{ $componente->segunda_lectura }}]</div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 bg-primary text-white"><b>Ultima lectura: {{ fecha_peru($lecturas->sortByDesc('id')->first()->fecha_lectura) }}, dentro del rango [ {{ $lecturas->sortByDesc('id')->first()->rango_lectura  }} ]</b></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr size="30">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                    <label for="fecha_lectura">RANGO LECTURA</label>
                                                        <select class="form-control" name="rango_lectura" id="rango_lectura">
                                                            <option value="{{ $componente->primera_lectura }}" @if($componente->primera_lectura==$current_rango) selected @endif>{{ $componente->primera_lectura }}</option>
                                                            <option value="{{ $componente->segunda_lectura }}" @if($componente->segunda_lectura==$current_rango) selected @endif>{{ $componente->segunda_lectura }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="ir">IR</label>
                                                        <input class="form-control" type="number" id="ir" name="ir" required min="0.00" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="is">IS</label>
                                                        <input class="form-control" type="number" id="is" name="is" required min="0.00" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="it">IT</label>
                                                        <input class="form-control" type="number" id="it" name="it" required min="0.00" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="ruidos">Ruidos</label>
                                                        <input class="form-control" type="number" id="ruidos" name="ruidos" required min="0.00" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="temperatura">Temperatura</label>
                                                        <input class="form-control" type="number" id="temperatura" name="temperatura" required min="0.00" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            @csrf
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-lg-4 col-md-6 col-sm-12"><b>PLANTA</b>:{{ $planta->nombre }}</div>
                    <div class="col-lg-4 col-md-6 col-sm-12"><b>SISTEMA</b>:{{ $sistema->nombre }}</div>
                    <div class="col-lg-4 col-md-6 col-sm-12"><b>EQUIPO</b>:{{ $equipo->nombre }}</div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12"><b>Componente</b>:{{ $componente->nombre }}</div>
                            <div class="col-lg-4 col-md-12 col-sm-12"><b>Codigo de parte</b>:{{ $componente->codigo_parte }}</div>
                            <div class="col-lg-4 col-md-12 col-sm-12"><b>Codigo de componente</b>:{{ $componente->codigo_componente }}</div>
                            <div class="col-lg-4 col-md-12 col-sm-12"><b>Acometida</b>:{{ $componente->acometida_alimentador }}</div>
                            <div class="col-lg-4 col-md-12 col-sm-12"><b>Rango de 1ra lectura</b>:[{{ $componente->primera_lectura }}]</div>
                            <div class="col-lg-4 col-md-12 col-sm-12"><b>Rango de 2da lectura</b>:[{{ $componente->segunda_lectura }}]</div>
                        </div>
                    </div>
                </div>
                <hr size="30">
                <div class="row">
                    <div class="col">
                        <h3>2 DATOS</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4>LECTURAS</h4>
                            <table class="table table-stripe table-sm table-bordered text-11">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th class="w-25">#</th>
                                        <th class="w-25">RANGO</th>
                                        <th class="w-50">FECHA</th>
                                        <th class="w-25">IR</th>
                                        <th class="w-25">IS</th>
                                        <th class="w-25">IT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($lecturas as $lectura)
                                    @php
                                        $i++;
                                    @endphp
                                        <tr id="lista_{{ $lectura->id }}">
                                            <td>{{ $i }}</td>
                                            <td>01-{{ explode('-',$lectura->rango_lectura)[1] }}-{{ $lectura->anio }}</td>
                                            <td>{{ fecha_peru($lectura->fecha_lectura) }}</td>
                                            <td>{{ $lectura->i_r }}</td>
                                            <td>{{ $lectura->i_s }}</td>
                                            <td>{{ $lectura->i_t }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4>GRAFICA</h4>
                            <div id="temps_div"></div>
                            @php
                                // \Lava::render('LineChart', 'Temps', 'temps_div')
                            @endphp
                            {{--  // With Blade Templates  --}}
                            @linechart('Temps', 'temps_div')
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
