@extends('layouts.admin')

@section('content')

<h1>Edit Product</h1>


<div class="col-sm-9">


{!! Form::model($products, ['method'=>'PATCH', 'action'=>['AdminProductController@update', $products->id], 'files'=>true]) !!}

	<div class="form-group">
		{!! Form::label('name', 'Name Product:')!!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('category_id', 'Category:') !!}
		{!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('cost', 'Cost:')!!}
		{!! Form::text('cost', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Update Product', ['class'=>'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}


	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminProductController@destroy', $products->id]]) !!}
	
	<div class="form-group">
		{!! Form::submit('Delete Product', ['class'=>'btn btn-danger']) !!}
	</div>
	
	{!! Form::close() !!}


	@include('includes.form_error')

@stop

