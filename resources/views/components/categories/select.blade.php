@props(['id','label', 'name', 'collection'=>[], 'selectedId'=>'','currentCategory'=>''])

<label for="{{ $id }}">{{ $label }}</label>

<select id="{{ $id }}"  name="{{ $name }}" 
{{ $attributes->class(["form-control","is-invalid"=> $errors->has($name)]) }}>
    <option value="">No parent</option>
     @foreach ($collection as $key => $value) 
    @if($key != $currentCategory)
    <option value="{{ $key }}"   @if($key== old($name,$selectedId )) selected @endif >{{$value}}</option> 
    @endif
    @endforeach
</select>