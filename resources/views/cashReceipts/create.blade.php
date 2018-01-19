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

                        <!-- if there are creation errors, they will show here -->
                        {{ Html::ul($errors->all()) }}
                    
                        {{ Form::open(array('url' => 'cashReceipts')) }}

                            <div class="form-group">
                                {{ Form::label('number_id', 'Number Id') }}
                                {{ Form::text('number_id', Request::old('number_id'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('date_of_issue', 'Date Issued') }}
                                {{ Form::date('date_of_issue', \Carbon\Carbon::now()) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('invoice_id', 'Invoice') }}
                                {{ Form::select('invoice_id', $invoices, null) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('amount', 'Amount') }}
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
