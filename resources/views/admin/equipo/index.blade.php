@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Equipo</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Lista</li>
@endsection
@section('contenido')
    <div class="card">
        <div class="card-header">
           <div class="row">
               <div class="col-10"><h3>LISTA DE EQUIPO</h3></div>
               <div class="col-2 text-right">
                   <a href="{{ route('equipo.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Nuevo</a href="{{ route('equipo.create') }}">
               </div>
           </div>
        </div>

        <div class="card-body">
            <table class="table table-stripe table-sm table-bordered">
                <thead>
                    <tr>
                        <th class="w-25">#</th>
                        <th class="w-50">Planta</th>
                        <th class="w-50">Sistema</th>
                        <th class="w-50">Nombre</th>
                        <th class="w-25">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($equipos as $equipo)
                    @php
                        $i++;
                    @endphp
                        <tr id="lista_{{ $equipo->id }}">
                            <td>{{ $i }}</td>
                            <td>{{ $plantas->where('id',$sistemas->where('id',$equipo->sistema_id)->first()->planta_id)->first()->nombre }}</td>
                            <td>{{ $sistemas->where('id',$equipo->sistema_id)->first()->nombre }}</td>
                            <td>{{ $equipo->nombre }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('equipo.edit',$equipo->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <form id="form_borrar_{{ $equipo->id }}" action="{{ route('equipo.destroy',$equipo->id) }}" method="get">
                                        @csrf
                                        <button type="button" class="btn btn-sm btn-danger" onclick="borrar_equipo('{{ $equipo->id }}','{{ $equipo->nombre }}')"><i class="fas fa-trash-alt"></i></button>
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
