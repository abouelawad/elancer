@extends('my-layouts.app')

@section('content')
@section('title page')
Show
<a class="btn btn-sm btn-outline-primary" href="{{ route('categories.edit',['category'=> $category->id]) }}">create</a>
@endsection

<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>description</th>
      <th>parent_id</th>
      <th>slug</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
      <td>{{ $category->parent_id }}</td>
      <td>{{ $category->slug }}</td>
    </tr>
   
  </tbody>
</table>
@endsection