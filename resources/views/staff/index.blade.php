@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h1 class="">Staff</h1>
                        <a href="{{ url('/staff/create') }}" class="btn btn-success btn-sm" title="Add New Staff">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/staff') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-2" role="search">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary d-none" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>

                            <button class="btn btn-secondary btn-sm ml-2" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Age</th><th>Salary</th><th>Phone</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($staff as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->age }}</td><td>{{ $item->salary }}</td><td>{{ $item->phone }}</td>
                                        <td>
                                            <a href="{{ url('/staff/' . $item->id) }}" title="View Staff"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/staff/' . $item->id . '/edit') }}" title="Edit Staff"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/staff' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Staff" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $staff->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
