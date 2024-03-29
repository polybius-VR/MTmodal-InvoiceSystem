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
                        <li><a href="{{ URL::to('sales') }}">Regresar</a></li>
                    </ul>
                </nav>

                <div class="panel-body">

                        <!-- if there are creation errors, they will show here -->
                        {{ Html::ul($errors->all()) }}
                    
                        {{ Form::open(array('url' => 'voidedInvoices')) }}

                            <div class="form-group">
                                {{ Form::label('invoice_id', 'Numero de Factura') }}
                                {{ Form::text('invoice_id', $invoice->number_id, ['readonly']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_voided', 'Date Voided') }}
                                {{ Form::date('date_voided', \Carbon\Carbon::now()) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::text('description', Request::old('description'), array('class' => 'form-control')) }}
                            </div>

                            {{ Form::submit('Anular Factura!', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
