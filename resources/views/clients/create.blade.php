@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('clients') }}">Client Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('clients') }}">View All Clients</a></li>
            <li><a href="{{ URL::to('clients/create') }}">Create a Client</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clients</div>

                <div class="panel-body">

                        <!-- if there are creation errors, they will show here -->
                        {{ Html::ul($errors->all()) }}
                    
                        {{ Form::open(array('url' => 'clients')) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
                            </div>

                            {{ Form::submit('Create the Client!', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
