@extends('layouts.app')


@section('title page','Create')
@section('content')



	<form action="{{ url('/categories') }}" method="post">
    @csrf
    @include('categories.form')
    <div class="form-group ">
    <button type="submit" class="btn btn-primary mt-3">submit</button>
    </div>
	</form>
@endsection
