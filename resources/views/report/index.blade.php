@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-header">Daily Report</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/order-product/dailyreport') }}" accept-charset="UTF-8" >
                            <div class="form-row">
                                <div class="col-4">
                                    <input type="date" class="form-control" name="date" placeholder="Search..." >
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>               
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Monthly Report</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/order-product/monthlyreport') }}" accept-charset="UTF-8" >
                            <div class="form-row">
                                <div class="col-4">
                                    @php
                                        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    @endphp
                                    <select class="form-control" name="month" >
                                        @foreach($months as $item)
                                        <option value="{{ $loop->iteration }}">{{ $item }}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                                <div class="col-4">
                                    @php
                                        //$start_at = 2020;
                                        $start_at = date('Y');
                                    @endphp
                                    <select class="form-control" name="year" >
                                        @for($year = $start_at; $year > $start_at - 5 ; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>  
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Yearly Report</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/order-product/yearlyreport') }}" accept-charset="UTF-8" >
                            <div class="form-row">
                                <div class="col-4">
                                    @php
                                        $start_at = 2020;
                                    @endphp
                                    <select class="form-control" name="year" >
                                        @for($year = $start_at; $year > $start_at - 5 ; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>  
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
