@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('receivableInvoices') }}">ReceivableInvoice Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('receivableInvoices') }}">View All ReceivableInvoices</a></li>
            <li><a href="{{ URL::to('receivableInvoices/create') }}">Create a ReceivableInvoice</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ReceivableInvoices</div>

                <div class="panel-body">
                    
                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>Invoice Number</td>
                                        <td>Date Issued</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($receivableInvoices as $key => $value)
                                    <tr>
                                        <td>{{ $value->number_id }}</td>
                                        <td>{{ $value->date_of_issue }}</td>                                        

                                        <!-- we will also add show, edit, and delete buttons -->
                                        <td>

                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('receivableInvoices/' . $value->number_id) }}">Show this ReceivableInvoice</a>

                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn btn-small btn-info" href="{{ URL::to('receivableInvoices/' . $value->number_id . '/edit') }}">Edit this ReceivableInvoice</a>

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
