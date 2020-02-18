@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Componente</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header"><h3>EDITAR componente</h3></div>
        <div class="card-body">
            <form action="{{route('componente.update',$componente->id)}}" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="planta">Planta</label>
                            <select class="form-control" name="planta_id" id="planta_id" onchange="mostrar_sistemas($(this).val(),'nuevo')">
                                @foreach ($plantas as $item)
                                    <option value="{{ $item->id }}" @if($componente->planta_id==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="sistema">Sistema</label>
                            <select class="form-control" name="sistema_id" id="sistema_id" onchange="mostrar_equipos($(this).val(),'nuevo')">
                                @foreach ($sistemas as $item)
                                    <option value="{{ $item->id }}" @if($componente->sistema_id==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="equipo">Equipo</label>
                            <select class="form-control" name="equipo_id" id="equipo_id">
                                @foreach ($equipos as $item)
                                    <option value="{{ $item->id }}" @if($componente->equipo_id==$item->id) selected @endif>{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" value="{{ $componente->nombre }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="codigo_parte">Codigo parte</label>
                        <input class="form-control" type="text" id="codigo_parte" name="codigo_parte" value="{{ $componente->codigo_parte }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="codigo_componente">Codigo componente</label>
                        <input class="form-control" type="text" id="codigo_componente" name="codigo_componente" value="{{ $componente->codigo_componente }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="acometida_alimentador">Acometida alimentador</label>
                        <input class="form-control" type="text" id="acometida_alimentador" name="acometida_alimentador" value="{{ $componente->acometida_alimentador }}" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="primera_lectura">Primera lectura</label>
                            <select class="form-control" type="text" id="primera_lectura" name="primera_lectura" required>
                                <option value="01-02" @if($componente->primera_lectura=='01-02') selected @endif>[01-02]</option>
                                <option value="03-04" @if($componente->primera_lectura=='03-04') selected @endif>[03-04]</option>
                                <option value="05-06" @if($componente->primera_lectura=='05-06') selected @endif>[05-06]</option>
                                <option value="07-08" @if($componente->primera_lectura=='07-08') selected @endif>[07-08]</option>
                                <option value="09-10" @if($componente->primera_lectura=='09-10') selected @endif>[09-10]</option>
                                <option value="11-12" @if($componente->primera_lectura=='11-12') selected @endif>[11-12]</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="segunda_lectura">Segunda lectura</label>
                            <select class="form-control" type="text" id="segunda_lectura" name="segunda_lectura" value="{{ old('primera_lectura') }}" required>
                                <option value="01-02" @if($componente->segunda_lectura=='01-02') selected @endif>[01-02]</option>
                                <option value="03-04" @if($componente->segunda_lectura=='03-04') selected @endif>[03-04]</option>
                                <option value="05-06" @if($componente->segunda_lectura=='05-06') selected @endif>[05-06]</option>
                                <option value="07-08" @if($componente->segunda_lectura=='07-08') selected @endif>[07-08]</option>
                                <option value="09-10" @if($componente->segunda_lectura=='09-10') selected @endif>[09-10]</option>
                                <option value="11-12" @if($componente->segunda_lectura=='11-12') selected @endif>[11-12]</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="visible-print text-center">
                            {{-- {!! QrCode::size(300)->generate(route('lectura.mostrar', base64_encode($componente->id))); !!} --}}
                            {!! QrCode::size(300)->generate(route('lectura.mostrar', $componente->id)); !!}
                            <p>Escanéame para mostrar los datos del componente y sus lecturas.</p>
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
