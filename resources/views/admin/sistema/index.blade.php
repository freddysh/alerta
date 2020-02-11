@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Sistema</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Lista</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
           <div class="row">
               <div class="col-10"><h3>LISTA DE SISTEMA</h3></div>
               <div class="col-2 text-right">
                   <a href="{{ route('sistema.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Nuevo</a href="{{ route('planta.create') }}">
               </div>
           </div>
        </div>

        <div class="card-body">
            <table class="table table-stripe table-sm table-bordered">
                <thead>
                    <tr>
                        <th class="w-25">#</th>
                        <th class="w-50">Planta</th>
                        <th class="w-50">Nombre</th>
                        <th class="w-25">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($sistemas as $sistema)
                    @php
                        $i++;
                    @endphp
                        <tr id="lista_{{ $sistema->id }}">
                            <td>{{ $i }}</td>
                            <td>{{ $sistema->planta->nombre }}</td>
                            <td>{{ $sistema->nombre }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('sistema.edit',$sistema->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form id="form_borrar_{{ $sistema->id }}" action="{{ route('sistema.destroy',$sistema->id) }}" method="get">
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-danger" onclick="borrar_sistema('{{ $sistema->id }}','{{ $sistema->nombre }}')"><i class="fas fa-trash-alt"></i></button>
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
