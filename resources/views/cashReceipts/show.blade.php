@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('cashReceipts') }}">CashReceipt Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('cashReceipts') }}">View All CashReceipts</a></li>
            <li><a href="{{ URL::to('cashReceipts/create') }}">Create a CashReceipt</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CashReceipts</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h1>Showing Invoice {{ $cashReceipt->number_id }}</h1>

                    <div class="jumbotron text-center">                        
                        <p>
                            <strong>Receipt Number:</strong> {{ $cashReceipt->number_id }}<br>
                            <strong>Date Issued:</strong> {{ $cashReceipt->date_of_issue }}<br>
                            <strong>Invoice:</strong> {{ $cashReceipt->invoice_id }}<br>
                            <strong>Amount:</strong> {{ $cashReceipt->amount }}<br>
                        </p>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
