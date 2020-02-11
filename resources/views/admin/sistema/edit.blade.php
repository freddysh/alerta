@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Sistema</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header"><h3>EDITAR PLANTA</h3></div>
        <div class="card-body">
            <form action="{{route('sistema.update',$sistema->id)}}" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="planta">Planta</label>
                            <select class="form-control" name="planta_id" id="planta_id">
                                @foreach ($plantas as $item)
                                    <option value="{{ $item->id }}" @if($sistema->planta_id==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" value="{{ $sistema->nombre }}" required>
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        @csrf
                        @method('put')
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
