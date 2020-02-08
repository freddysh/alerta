@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Planta</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Lista</li>
@endsection
@section('contenido')
    <div class="card">
        <div class="card-header">
           <div class="row">
               <div class="col-10"><h3>LISTA DE PLANTAS</h3></div>
               <div class="col-2 text-right">
                   <a href="{{ route('planta.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Nuevo</a href="{{ route('planta.create') }}">
               </div>
           </div>
        </div>

        <div class="card-body">
            <table class="table table-stripe table-sm table-bordered">
                <thead>
                    <tr>
                        <th class="w-25">#</th>
                        <th class="w-50">Nombre</th>
                        <th class="w-25">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($plantas as $planta)
                    @php
                        $i++;
                    @endphp
                        <tr id="lista_{{ $planta->id }}">
                            <td>{{ $i }}</td>
                            <td>{{ $planta->nombre }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('planta.edit',$planta->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form id="form_borrar_{{ $planta->id }}" action="{{ route('planta.destroy',$planta->id) }}" method="get">
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-danger" onclick="borrar_planta('{{ $planta->id }}','{{ $planta->nombre }}')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
