@extends('layouts.app')

@section('content')
  
    
    @section('title page')
    Categories
    <a class="btn btn-sm btn-outline-primary" href="{{ url('categories/create') }}">create</a>
    @endsection
      <div class="row">
        @if(session()->has('success'))
        <div class='alert alert-success alert-dismissible fade show' role ='alert'>
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class='close' data-dismiss="alert" area-label='close'>
                <span area-hidden='true' >&times;</span>
            </button>
        </div>
        @endif 
      </div>

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>id</th>
          <th>name</th>
          <th>description</th>
          <th>parent_id</th>
          <th>slug</th>
          <th class="text-center">actions</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td><a href="{{ url('categories', ['category'=> $category->id]) }}">{{ $category->name }}</a></td>
          <td>{{ $category->description }}</td>
          <td>{{ $category->parent_id }}</td>
          <td>{{ $category->slug }}</td>
          <td id='basic-edit' class="align-middle text-center p-0">

            <div class="d-flex justify-content-center  form-inline ">
              <a href="{{ url('categories/edit', ['category' => $category->id]) }}" class="btn-sm btn-primary m-2">
                 <span class="fe fe-edit"></span> Edit 
              </a>
              <form class="form-inline" action="{{ url('categories', ['category' => $category->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn-sm btn-danger">
                   <span class="si si-trash"><i class="bi bi-trash"></i></span>delete
                </button>
                </form>
              </div>

            </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  
@endsection
