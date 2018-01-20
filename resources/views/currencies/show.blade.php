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
                        <a class="navbar-brand" href="{{ URL::to('currencies') }}">Monedas</a>
                    </div>
                    <ul class="nav navbar-nav">            
                    <li><a href="{{ URL::to('currencies') }}">Regresar</a></li>
                        <li><a href="{{ URL::to('currencies/create') }}">Agregar Moneda</a>
                    </ul>
                </nav>

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
