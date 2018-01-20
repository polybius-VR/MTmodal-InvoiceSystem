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
                        <a class="navbar-brand" href="{{ URL::to('cashReceipts') }}">Recibos de Caja</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('cashReceipts') }}">Regresar</a></li>
                    </ul>
                </nav>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h1>Showing Invoice {{ $cashReceipt->number_id }}</h1>

                    <div class="jumbotron text-center">                        
                        <p>
                            <strong>Numero Recibo de Caja:</strong> {{ $cashReceipt->number_id }}<br>
                            <strong>Fecha de Emision:</strong> {{ $cashReceipt->date_of_issue }}<br>
                            <strong>Factura:</strong> {{ $cashReceipt->invoice_id }}<br>
                            <strong>Monto:</strong> {{ $cashReceipt->amount }}<br>
                        </p>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
