@extends('layouts.admin')

@section('content')

	<div class="col-sm-6">
		<h3>Update Category</h3>
		{!! Form::model($categories, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $categories->id], 'files'=>true]) !!}
		
			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
			</div>
	
	{!! Form::close() !!}
	
	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $categories->id]]) !!}
	
	<div class="form-group">
		{!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
	</div>
	
	{!! Form::close() !!}
	</div>
	
	
@stop