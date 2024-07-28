@props(['id', 'label', 'type', 'name', 'value'=>'' ])
<label for="{{$id}}">{{$label}}</label>
  <input type="{{ $type??'text' }}" 
        
        @error($name) is-invalid @enderror 
        name="{{ $name }}" 
        id="{{$id}}" 
        value="{{ old($name, $value) }}"  --}}
        {{ $attributes->class(['form-control','is-invalid'=> $errors->has($name)]) }}
        
        @error($name) is-invalid @enderror >
    @error($name)
      <p class="invalid-feedback">{{ $message }} </p>
    @enderror