@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clients</div>

                <div class="panel-body">
                    
                        <div>
                            <ul>
                                @foreach ($clients as $client)
                                    <li> 
                                        <a href="/clients/{{ $client->id }}">{{ $client->name }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
