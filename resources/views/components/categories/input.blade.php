@props(['id', 'label', 'type', 'name', 'categoryValue' ])
<label for="{{$id}}">{{$label}}</label>
  <input type="{{ $type??'text' }}" 
        
        @error($name) is-invalid @enderror 
        name="{{ $name }}" 
        id="{{$id}}" 
        value="{{ old($name, $categoryValue) }}" {{-- $value=$category --}}
        {{ $attributes->class(['form-control','is-invalid'=> $errors->has($name)]) }}
        
        @error($name) is-invalid @enderror >
    @error($name)
      <p class="invalid-feedback">{{ $message }} </p>
    @enderror