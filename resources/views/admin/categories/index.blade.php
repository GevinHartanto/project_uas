@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_categories'))
		<p class="bg-danger">{{session('deleted_categories')}}</p>
	@endif

	<h1>Categories</h1>
	<div class="col-sm-6">
		@if($categories)
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
						<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
	
@stop