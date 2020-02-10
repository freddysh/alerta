<option value="0">Escoja un opcion</option>
@if(!empty($equipos))
  @foreach($equipos->sortBy('nombre') as $value)
    <option value="{{ $value->id }}">{{ $value->nombre }}</option>
  @endforeach
@endif
