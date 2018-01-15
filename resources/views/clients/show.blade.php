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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                    <ul>                
                        <li> {{ $client->name }} </li>                    
                    </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
