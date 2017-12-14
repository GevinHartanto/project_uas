@extends('layouts.admin')

@section('content')

	<div class="col-sm-6">
		<h3>Create Category</h3>
		{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
		
			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
			</div>
			
		{!! Form::close() !!}
		@include('includes.form_error')
	</div>
	
@stop