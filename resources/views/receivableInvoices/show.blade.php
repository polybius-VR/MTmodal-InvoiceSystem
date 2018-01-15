@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('receivableInvoices') }}">ReceivableInvoice Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('receivableInvoices') }}">View All ReceivableInvoices</a></li>
            <li><a href="{{ URL::to('receivableInvoices/create') }}">Create a ReceivableInvoice</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ReceivableInvoices</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Showing Invoice {{ $receivableInvoice->number_id }}</h1>

                    <div class="jumbotron text-center">                        
                        <p>
                            <strong>Invoice Number:</strong> {{ $receivableInvoice->number_id }}<br>
                            <strong>Date Issued:</strong> {{ $receivableInvoice->date_of_issue }}<br>
                            <strong>Client:</strong> {{ $client->name }}<br>
                            <strong>Currency:</strong> {{ $currency->currency }}<br>
                            <strong>Amount:</strong> {{ $receivableInvoice->amount }}<br>
                        </p>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
