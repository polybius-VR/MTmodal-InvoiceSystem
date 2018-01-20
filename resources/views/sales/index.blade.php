@extends('layouts.app')

@section('style')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('sales') }}">Ventas</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('receivableInvoices/create') }}">Facturar</a>
            </ul>
            
        </nav>

                <div class="panel-body">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>ORDEN DE VENTA</th>
                                <th>NUMERO DE FACTURA</th>
                                <th>FECHA FACTURADO</th>
                                <th>REFERENCIA SERVICIO</th>
                                <th>CLIENTE</th>
                                <th>MONEDA</th>
                                <th>MONTO FACTURADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
        select: true,
        processing: true,
        serverSide: true,
        ajax: '{{ route('sales/getdata') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'number_id', name: 'receivable_invoices.number_id'},
            {data: 'date_of_issue', name: 'receivable_invoices.date_of_issue'},
            {data: 'reference', name: 'reference'},
            {data: 'name', name: 'clients.name'},
            {data: 'currency', name: 'currencies.currency'},
            {data: 'amount', name: 'receivable_invoices.amount'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
});
</script>
@endpush