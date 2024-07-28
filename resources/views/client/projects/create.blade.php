@extends('layouts-hireo.app')


@section('title page','Create')
@section('content')



	<form action="{{ route('client.projects.store') }}" method="post">
    @csrf
    @include('client.projects.form')
    <div class="form-group ">
    <button type="submit" class="btn btn-primary mt-3">submit</button>
    </div>
	</form>
@endsection
