@extends('layouts.admin')

@section('content')
	
	<h1>Reports</h1>
	
            
    <table class="table">                   
		<thead>
				<tr>
				{!! Form::open(['method'=>'POST', 'action'=>'ReportController@store', 'files'=>true]) !!}
				<th>
					Bulan
					<select name="bulan">
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</th>
				
				<th>
					Tahun
					<select name="tahun">
					<?php
						$mulai= date('Y') - 50;
						for($i = $mulai;$i<$mulai + 200;$i++)
						{
							$sel = $i == date('Y') ? ' selected="selected"' : '';
							echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
						}
					?>
					</select>
				</th>
					
				<th>
					<div class="form-group">
						{!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
					</div>
				</th>
				
				{!! Form::close() !!}
				
				</tr>
				
				<tr>
				<th>User</th>
				<th>Customer</th>
				<th>Product</th>
				<th>Harga</th>
				<th>Qty</th>
				<th>Sub Price</th>
				<th>Margin</th>
				<th>Created</th>
				<th>Updated</th>
				</tr>
			</tr>
		</thead>
		<tbody>
			@if($transactions)
				@foreach($transactions as $transaction)
			<tr>
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