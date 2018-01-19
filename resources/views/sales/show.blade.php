@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('sales') }}">Sale Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('sales') }}">View All Sales</a></li>
            <li><a href="{{ URL::to('sales/create') }}">Create a Sale</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sales</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="jumbotron text-center">                        
                        <p>
                            <strong>Reference:</strong> {{ $sale->reference }}<br>
                            <strong>Invoice:</strong> {{ $sale->invoice_id }}<br>
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
