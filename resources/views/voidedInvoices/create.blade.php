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

                        <!-- if there are creation errors, they will show here -->
                        {{ Html::ul($errors->all()) }}
                    
                        {{ Form::open(array('url' => 'voidedInvoices')) }}

                            <div class="form-group">
                                {{ Form::label('invoice_id', 'Invoice') }}
                                {{ Form::select('invoice_id', $invoices, null) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_voided', 'Date Voided') }}
                                {{ Form::date('date_voided', \Carbon\Carbon::now()) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::text('description', Request::old('description'), array('class' => 'form-control')) }}
                            </div>

                            {{ Form::submit('Create the voidedInvoice!', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
