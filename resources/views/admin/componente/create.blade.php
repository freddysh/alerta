@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Sistema</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header"><h3>NUEVO SISTEMA</h3></div>
        <div class="card-body">
            <form action="{{route('componente.store')}}" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="planta">Planta</label>
                            <select class="form-control" name="planta_id" id="planta_id" onchange="mostrar_sistemas($(this).val(),'nuevo')">
                                @foreach ($plantas as $item)
                                    <option value="{{ $item->id }}" @if(old('planta_id')==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="sistema">Sistema</label>
                            <select class="form-control" name="sistema_id" id="sistema_id" onchange="mostrar_equipos($(this).val(),'nuevo')">
                                @foreach ($sistemas as $item)
                                    <option value="{{ $item->id }}" @if(old('sistema_id')==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="equipo">Equipo</label>
                            <select class="form-control" name="equipo_id" id="equipo_id">
                                @foreach ($equipos as $item)
                                    <option value="{{ $item->id }}" @if(old('equipo_id')==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="codigo_parte">Codigo parte</label>
                        <input class="form-control" type="text" id="codigo_parte" name="codigo_parte" value="{{ old('codigo_parte') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="codigo_componente">Codigo componente</label>
                        <input class="form-control" type="text" id="codigo_componente" name="codigo_componente" value="{{ old('codigo_componente') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="acometida_alimentador">Acometida alimentador</label>
                        <input class="form-control" type="text" id="acometida_alimentador" name="acometida_alimentador" value="{{ old('acometida_alimentador') }}" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="primera_lectura">Primera lectura</label>
                            <select class="form-control" type="text" id="primera_lectura" name="primera_lectura" value="{{ old('primera_lectura') }}" required>
                                <option value="01-02">[01-02]</option>
                                <option value="03-04">[03-04]</option>
                                <option value="05-06">[05-06]</option>
                                <option value="07-08">[07-08]</option>
                                <option value="09-10">[09-10]</option>
                                <option value="11-12">[11-12]</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="segunda_lectura">Segunda lectura</label>
                            <select class="form-control" type="text" id="segunda_lectura" name="segunda_lectura" value="{{ old('primera_lectura') }}" required>
                                <option value="01-02">[01-02]</option>
                                <option value="03-04">[03-04]</option>
                                <option value="05-06">[05-06]</option>
                                <option value="07-08">[07-08]</option>
                                <option value="09-10">[09-10]</option>
                                <option value="11-12">[11-12]</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        @csrf
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
