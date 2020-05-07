@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h1>Staff {{ $staff->id }}</h1>
                        

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $staff->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $staff->name }} </td></tr><tr><th> Age </th><td> {{ $staff->age }} </td></tr><tr><th> Salary </th><td> {{ $staff->salary }} </td></tr><tr><th> Phone </th><td> {{ $staff->phone }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
