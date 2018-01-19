@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('sales') }}">Sale Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('sales') }}">View All Sales</a></li>
            <li><a href="{{ URL::to('sales/create') }}">Create a Sale</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sales</div>

                <div class="panel-body">

                        <!-- if there are creation errors, they will show here -->
                        {{ Html::ul($errors->all()) }}
                    
                        {{ Form::open(array('url' => 'sales')) }}

                            <div class="form-group">
                                {{ Form::label('reference', 'Reference') }}
                                {{ Form::text('reference', Request::old('reference'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('invoice_id', 'Invoice') }}
                                {{ Form::select('invoice_id', $invoices, null) }}
                            </div>

                            {{ Form::submit('Create the Sale!', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
