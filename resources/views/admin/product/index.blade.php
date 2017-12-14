@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_product'))
		<p class="bg-danger">{{session('deleted_product')}}</p>
	@endif

<h1>Product</h1>

<table class="table">
	<thead>
		<tr>
			<th>ID</td>
			<th>Product Name</td>
			<th>Category Product</td>
			<th>Cost</td>
			<th>Created</td>
			<th>Updated</td>
		</tr>
	</thead>
	<tbody>
		@if($products)
				@foreach($products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td><a href="{{route('admin.product.edit', $product->id)}}">{{$product->name}}</a></td>
				<td>{{$product->category ? $product->category->name : 'Uncategorized'}}</td>
				<td>{{$product->cost}}</td>
				<td>{{$product->created_at}}</td>					
				<td>{{$product->updated_at}}</td>
			</tr>
				@endforeach
			@endif
	</tbody>
</table>

@stop