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

                    <!-- if there are creation errors, they will show here -->
                    {{ Html::ul($errors->all()) }}

                    {{ Form::model($receivableInvoice, array('route' => array('receivableInvoices.update', $receivableInvoice->number_id), 'method' => 'PUT')) }}

                        <div class="form-group">
                            {{ Form::label('number_id', 'Invoice Number') }}
                            {{ Form::text('number_id', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('date_of_issue', 'Date Issued') }}
                            {{ Form::date('date_of_issue', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('client_id', 'Client') }}
                            {{ Form::select('client_id', $clients, null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('currency_id', 'Currency') }}
                            {{ Form::select('currency_id', $currencies, null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('amount', 'Amount') }}
                            {!! Form::number('amount',null,['class' => 'form-control','step'=>'any']) !!}
                        </div>

                        {{ Form::submit('Edit the ReceivableInvoice!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
