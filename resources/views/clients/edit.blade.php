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
                        <a class="navbar-brand" href="{{ URL::to('clients') }}">Clientes</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('clients') }}">Regresar</a></li>
                    </ul>
                </nav>

                <div class="panel-body">

                    <!-- if there are creation errors, they will show here -->
                    {{ Html::ul($errors->all()) }}

                    {{ Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'PUT')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Nombre del Cliente') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        {{ Form::submit('Edit the Client!', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
