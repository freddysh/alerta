@extends('layouts.app_export_pdf')
@section('content')

<table>
    <thead>
        <tr>
            <td>Planta</td>
            <td>{{ $plantas->where('id',$componente->planta_id)->first()->nombre }}</td>
        </tr>
        <tr>
            <td>Sistema</td>
            <td>{{ $sistemas->where('id',$componente->sistema_id)->first()->nombre }}</td>
        </tr>
        <tr>
            <td>Equipo</td>
            <td>{{ $equipos->where('id',$componente->equipo_id)->first()->nombre }}</td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>{{ $componente->nombre }}</td>
        </tr>
        <tr>
            <td>Codigo parte<</td>
            <td>{{ $componente->codigo_parte }}</td>
        </tr>
        <tr>
            <td>Codigo componente</td>
            <td>{{ $componente->codigo_componente }}</td>
        </tr>
        <tr>
            <td>Acometida alimentador</td>
            <td>{{ $componente->acometida_alimentador }}</td>
        </tr>
        <tr>
            <td>Acometida alimentador</td>
            <td>{{ $componente->acometida_alimentador }}</td>
        </tr>
        <tr>
            <td>QR</td>
            <td>
                {{-- {!! QrCode::format('svg')->size(300)->generate(route('lectura.mostrar',$componente->id)) !!} --}}
                <div class="visible-print text-center">
                    <img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(200)->generate(route('lectura.mostrar',$componente->id))) !!}" >
                    {{-- {{ QrCode::size(300)->generate(route('lectura.mostrar', $componente->id)) }} --}}
                    {{-- @php
                    echo QrCode::size(300)->generate(route('lectura.mostrar', $componente->id));
                    @endphp --}}
                </div>
            </td>
        </tr>
    </thead>
</table>
@endsection
