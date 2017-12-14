@extends('layouts.admin')

@section('content')
	
	@if(Session::has('deleted_user'))
		<p class="bg-danger">{{session('deleted_user')}}</p>
	@endif

	<h1>Users</h1>
	
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			@if($users)
				@foreach($users as $user)
			
				<tr>
					<td>{{$user->id}}</td>
					<td><img height="50" src="{{$user->photo ? $user->photo->file : 'no user photo'}}" /</td>
					<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
					<td>{{$user->email}}</td>
					<td>{{$user->created_at}}</td>					
					<td>{{$user->updated_at}}</td>
				</tr>
				
				@endforeach
			@endif
		</tbody>
	</table>
	
@stop