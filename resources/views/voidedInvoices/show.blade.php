@extends('layouts.app')

@section('content')
<div class="container">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ URL::to('voidedInvoices') }}">Facturas Anuladas</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('voidedInvoices') }}">Regresar</a></li>
                    </ul>
                </nav>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <h1>Showing Invoice {{ $voidedInvoice->invoice_id }}</h1>

                    <div class="jumbotron text-center">                        
                        <p>
                            <strong>Numero de Factura:</strong> {{ $voidedInvoice->invoice_id }}<br>
                            <strong>Fecha Anulada:</strong> {{ $voidedInvoice->date_voided }}<br>
                            <strong>Descripcion:</strong> {{ $voidedInvoice->description }}<br>
                        </p>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
