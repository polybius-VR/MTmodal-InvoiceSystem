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
                        <a class="navbar-brand" href="{{ URL::to('cashReceipts') }}">Recibos de Caja</a>
                    </div>
                </nav>

                <div class="panel-body">
                    
                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Fecha de Emision</td>
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cashReceipts as $key => $value)
                                    <tr>
                                        <td>{{ $value->number_id }}</td>
                                        <td>{{ $value->date_of_issue }}</td>                                        

                                        <!-- we will also add show, edit, and delete buttons -->
                                        <td>

                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('cashReceipts/' . $value->number_id) }}">Detalle</a>

                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <!-- <a class="btn btn-small btn-info" href="{{ URL::to('cashReceipts/' . $value->number_id . '/edit') }}">Edit this CashReceipt</a> -->

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
