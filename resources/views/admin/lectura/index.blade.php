@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Componente</a></li>
    {{-- <li class="breadcrumb-item"><a href="#">Lista</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Lista</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
           <div class="row">
               <div class="col-10"><h3>BUSCAR UN COMPONENTE</h3></div>
            </div>
        </div>
        <div class="card-body">
        <form action="{{ route('lectura.buscar') }}" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            {{-- <label for="">Ingrese el codigo</label> --}}
                        <input class="form-control" type="text" name="codigo" id="codigo" placeholder="Ingrese el codigo" value="{{old('codigo')}}" required >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
