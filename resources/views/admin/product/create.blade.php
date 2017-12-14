@extends('layouts.admin')

@section('content')

<h1>Insert Product</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminProductController@store', 'files'=>true]) !!}

	<div class="form-group">
		{!! Form::label('name', 'Name Product:')!!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('category_id', 'Category:') !!}
		{!! Form::select('category_id', [''=>'Choose Categorys'] + $categories, null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('cost', 'Cost:')!!}
		{!! Form::text('cost', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

	@include('includes.form_error')

@stop