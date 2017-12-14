@extends('layouts.admin')

@section('content')

	<h1>Edit User</h1>

	
	<div class="col-sm-3">
		<img src="{{$user->photo ? $user->photo->file : ''}}" class="img-responsive img-rounded" />
	</div>
	
	<div class="col-sm-9">
	
	{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name:')!!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('email', 'Email:')!!}
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('photo_id', 'Photo:')!!}
		{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('password', 'Password:')!!}
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}	
	
	
	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
	
	<div class="form-group">
		{!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
	</div>
	{!! Form::close() !!}
	
	</div>
	
	@include('includes.form_error')
	
@stop