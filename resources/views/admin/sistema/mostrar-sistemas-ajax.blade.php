<option value="0">Escoja un opcion</option>
@if(!empty($sistemas))
  @foreach($sistemas->sortBy('nombre') as $value)
    <option value="{{ $value->id }}">{{ $value->nombre }}</option>
  @endforeach
@endif
