@extends('layouts.app')


@section('content')
	<form action="{{ url('/categories', ['category' => $category->id]) }}" method="post">
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" id="name"
				value="{{ $category->name }}">
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control" name="description" id="description">{{ ($category->description) }}</textarea>
		</div>

		<div class="form-group">

			<label for="parent_id">Parent</label>
			<select id="parent_id" class="form-control" name="parent_id">
				<option value="">No parent</option>
				@foreach ($categories as $cat)
                    @if($cat->id !=$category->id )
                        <option value="{{ $cat->id }}" @if($category->parent_id == $cat->id) selected @endif>{{  $cat->name }}</option>
                    @endif
                @endforeach
			</select>

		</div>

		<div class="form-group">
			<label for="file">File</label>
			<input type="file" class="form-control" name="image" id="file">
		</div>

		<div class="form-group ">
			<button type="submit" class="btn btn-primary mt-3">submit</button>
		</div>
	</form>
@endsection
