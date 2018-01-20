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
                        <a class="navbar-brand" href="{{ URL::to('sales') }}">Recibos de Caja</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('sales') }}">Regresar</a></li>
                    </ul>
                </nav>

                <div class="panel-body">

                        <!-- if there are creation errors, they will show here -->
                        {{ Html::ul($errors->all()) }}
                    
                        {{ Form::open(array('url' => 'cashReceipts')) }}

                            <div class="form-group">
                                {{ Form::label('reference', 'Referencia del Servicio Prestado') }}
                                {{ Form::text('reference', $sale->reference, ['readonly']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('number_id', 'Numero de Recibo de Caja') }}
                                {{ Form::text('number_id', Request::old('number_id'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_of_issue', 'Fecha de Emision') }}
                                {{ Form::date('date_of_issue', \Carbon\Carbon::now()) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('invoice_id', 'Numero de Factura') }}
                                {{ Form::text('invoice_id', $invoice->number_id, ['readonly']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('amount', 'Monto') }}
                                {!! Form::number('amount',null,['class' => 'form-control','step'=>'any']) !!}
                            </div>

                            {{ Form::submit('Create the CashReceipt!', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
