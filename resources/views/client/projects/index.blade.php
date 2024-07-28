@extends('layouts-hireo.app')


@section('content')

	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				Projects
        <a class="btn btn-sm btn-outline-primary" role="button" href="{{route('client.projects.create') }}">create</a>

			</div>
		</div>
	</div>

	
	<div class="row">
		<x-flash-messages />
	</div>

	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>id</th>
				<th>Client</th>
				<th>Description</th>
				<th>Title</th>
				<th>Status</th>
				<th>Type</th>
				<th>Budget</th>
				<th class="text-center">actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td>{{ $project->id }}</td>
					<td><a href="{{ route('client.projects.show', ['project' => $project->id]) }}">{{ $project->user->name }}</a></td>
					<td>{{ $project->description }}</td>
					<td>{{ $project->title }}</td>
					<td>{{ $project->status }}</td>
					<td>{{ $project->type }}</td>
					<td>{{ $project->budget }}</td>
					<td id='basic-edit' class="align-middle text-center p-0">

						<div class="d-flex justify-content-center  form-inline ">
							<a href="{{ route('client.projects.edit', ['project' => $project->id]) }}" class="btn-sm btn-primary m-2">
								<span class="fe fe-edit"></span> Edit
							</a>
							<form class="form-inline" action="{{ route('client.project.destroy', ['project' => $project->id]) }}"
								method="post">
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
	{{ $projects->links() }}
@endsection
