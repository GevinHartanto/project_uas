@extends('layouts.admin')

@section('content')

	<h1>Edit Transaction</h1>
	
	{!! Form::model($transactions, ['method'=>'PATCH', 'action'=>['AdminTransactionsController@update', $transactions->id], 'files'=>true]) !!}
	
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
		{!! Form::submit('Update Transaction', ['class'=>'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}	
	
	
	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminTransactionsController@destroy', $transactions->id]]) !!}
	
	<div class="form-group">
		{!! Form::submit('Delete Transaction', ['class'=>'btn btn-danger']) !!}
	</div>
	
	{!! Form::close() !!}
	
	
	
	@include('includes.form_error')
	
@stop