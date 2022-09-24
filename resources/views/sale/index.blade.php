@extends('layouts.app')


@section('content')
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
	    @foreach ($sales as $sale)
	    <tr>
	        <td>{{ $sale->id }}</td>
            <td>{{ $sale->user->name }}</td>
	        <td>{{ $sale->product_name }}</td>
	        <td>{{ $sale->product_price }}</td>
	    </tr>
	    @endforeach
    </table>


    {!! $sales->links() !!}


@endsection