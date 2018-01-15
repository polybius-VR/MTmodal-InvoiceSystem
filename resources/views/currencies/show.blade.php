@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('currencies') }}">Currency Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('currencies') }}">View All Currencies</a></li>
            <li><a href="{{ URL::to('currencies/create') }}">Create a Currency</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Currencies</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                    <ul>                
                        <li> {{ $currency->currency }} </li>                    
                    </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
