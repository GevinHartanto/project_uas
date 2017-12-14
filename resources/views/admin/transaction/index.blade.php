@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_transaction'))
		<p class="bg-danger">{{session('deleted_transaction')}}</p>
	@endif


<h1>Transaction</h1>

<table class="table">
	<thead>
		<tr>
			<th>ID</td>
			<th>User Name</td>
			<th>Nama Customer</td>
			<th>Product</td>
			<th>Price</td>
			<th>Qty</td>
			<th>SubPrice</td>
			<th>Margin</rd>
			<th>Created</td>
			<th>Updated</td>
			
		</tr>
	</thead>
	<tbody>
		@if($transactions)
				@foreach($transactions as $transaction)
			<tr>
				<td><a href="{{route('admin.transaction.edit', $transaction->id)}}">{{$transaction->id}}</a></td>
				<td>{{$transaction->user ? $transaction->user->name : ""}}</td>
				<td>{{$transaction->customer}}</td>
				<td>{{$transaction->product ? $transaction->product->name : ""}}</td>
				<td>{{$transaction->price}}</td>
				<td>{{$transaction->qty}}</td>
				<td>{{$transaction->price * $transaction->qty}}</td>
				<td>
					{{($transaction->price - $transaction->product->cost)*$transaction->qty}}
				</td>
				<td>{{$transaction->created_at}}</td>					
				<td>{{$transaction->updated_at}}</td>
			</tr>
				@endforeach
			@endif
	</tbody>
</table>

@stop