@extends('bootstrap-theme')

@section('content')

<h1>World Coronavirus Report</h1>

<form action="{{ url('/covid19') }}" method="GET" class="my-4">
    <input name="search" id="search" value="{{ request('search') }}" />
    <button type="submit">Search</button>
</form>

<table class="table table-sm table-bordered text-right" style="width:50%">
    <tr>
        <th>Date</th> <th>Country</th> <th>Total</th> <th>Active</th> 
        <th>Death</th> <th>Recovered</th> <th>Total in 1 Millon</th>
        <th>Action</th>
    </tr>
    @foreach($covid19s as $item)
    <tr>
        <td>{{ $item->date  }}</td>
        <td>{{ $item->country }}</td>
        <td>{{ number_format( $item->total ) }}</td>
        <td>{{ number_format( $item->active )  }}</td>
        <td>{{ number_format( $item->death )  }}</td>
        <td>{{ number_format( $item->recovered )  }}</td>
        <td>{{ number_format( $item->total_in_1m , 2) }}</td>
        <td>
            <a href="{{ url('/covid19/'.$item->id ) }}" class="btn btn-sm btn-primary">View</a>
        </td>
    </tr>
    @endforeach
</table>

<div class="mt-4">{{ $covid19s->appends(['search' => request('search')])->links() }}</div>

@endsection