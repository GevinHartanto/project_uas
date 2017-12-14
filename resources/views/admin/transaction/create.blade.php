@extends('layouts.admin')

@section('content')

	<h1>Insert Transaction</h1>
	
	{!! Form::open(['method'=>'POST', 'action'=>'AdminTransactionsController@store', 'files'=>true]) !!}
	
	<div class="form-group">
		{!! Form::label('customer', 'Name Customer:')!!}
		{!! Form::text('customer', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('product_id', 'Product:') !!}
		{!! Form::select('product_id', [''=>'Choose Products'] + $products, null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('qty', 'Qty:')!!}
		{!! Form::text('qty', null, ['class'=>'form-control']) !!}
	</div>	
	
	<div class="form-group">
		{!! Form::label('price', 'Price:')!!}
		{!! Form::text('price', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Create Transaction', ['class'=>'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}	
	
	@include('includes.form_error')
	
@stop