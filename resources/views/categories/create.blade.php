@extends('layouts.app')


@section('content')


	<form action="{{ url('/categories') }}" method="post">
    @csrf
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
        @error('name')
          <p class="invalid-feedback">{{ $message }} </p>
        @enderror
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"></textarea>
      @error('description')
          <p class="invalid-feedback">{{ $message }} </p>
      @enderror
		</div>

    <div class="form-group">
        
            <label for="parent_id">Parent</label>
            <select id="parent_id" class="form-control" name="parent_id">
                <option value="">No parent</option>
                @foreach ($categories as $category)
                  
                <option value="{{ $category->id }}">{{ $category->name }} </option>
                @endforeach
            </select>
        
    </div>

    <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="form-group ">
    <button type="submit" class="btn btn-primary mt-3">submit</button>
    </div>
	</form>
@endsection
