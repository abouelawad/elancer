@extends('layouts.app')


@section('content')
@section('title page','Edit')
	<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
		@method('PUT')
		@csrf
        @include('categories.form')
		<div class="form-group ">
			<button type="submit" class="btn btn-primary mt-3">submit</button>
		</div>
	</form>
@endsection
