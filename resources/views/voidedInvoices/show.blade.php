@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('voidedInvoices') }}">VoidedInvoice Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('voidedInvoices') }}">View All VoidedInvoices</a></li>
            <li><a href="{{ URL::to('voidedInvoices/create') }}">Create a VoidedInvoice</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">VoidedInvoices</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <h1>Showing Invoice {{ $voidedInvoice->invoice_id }}</h1>

                    <div class="jumbotron text-center">                        
                        <p>
                            <strong>Invoice Number:</strong> {{ $voidedInvoice->invoice_id }}<br>
                            <strong>Date Voided:</strong> {{ $voidedInvoice->date_voided }}<br>
                            <strong>Description:</strong> {{ $voidedInvoice->description }}<br>
                        </p>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
