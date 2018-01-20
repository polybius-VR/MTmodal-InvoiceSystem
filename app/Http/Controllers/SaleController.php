<?php

namespace App\Http\Controllers;

use App\Sale;
use App\ReceivableInvoice;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //
    public function index(){
        $sales = Sale::all();    
        return view('sales.index', compact('sales'));
    }

    public function datatable()
    {
        return view('sales.index');
    }

    public function getData()
    {
        $invoices = DB::table('sales')
        ->join('receivable_invoices', 'sales.invoice_id', '=', 'receivable_invoices.number_id')
        ->join('clients', 'receivable_invoices.client_id', '=', 'clients.id')
        ->join('currencies', 'receivable_invoices.currency_id', '=', 'currencies.id')
        ->select('sales.id', 'receivable_invoices.number_id', 'receivable_invoices.date_of_issue', 'sales.reference', 'clients.name', 'currencies.currency', 'receivable_invoices.amount');
        return Datatables::of(
            $invoices
            )
            ->addColumn('action', function ($invoices) {
                return '<a href="sales/'.$invoices->id.'" class="btn btn-xs btn-primary">Detalle</a>';
            })
            ->make(true);
    }

    public function create(){
        $invoices = ReceivableInvoice::pluck('number_id', 'number_id');
        return view('sales.create', compact('invoices'));
    }

    public function store(){
        $rules = array(
            'reference' => 'required',
            'invoice_id' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sales/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $sale = new Sale;
            $sale->reference = Request::get('reference');
            $sale->invoice_id = Request::get('invoice_id');
            $sale->save();

            // redirect
            Session::flash('message', 'Successfully created Sale!');
            return Redirect::to('sales');
        }
    }

    public function show(Sale $sale){
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale){
        $invoices = ReceivableInvoice::pluck('number_id', 'number_id');
        return view('sales.edit', compact('sale', 'invoices'));
    }

    public function update(Sale $sale)
    {
        // validate
        $rules = array(
            'reference' => 'required',
            'invoice_id' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sales/' . $sale->id . '/edit')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $sale->reference = Request::get('reference');
            $sale->invoice_id = Request::get('invoice_id');
            $sale->save();

            // redirect
            Session::flash('message', 'Successfully updated sale!');
            return Redirect::to('sales');
        }
    }

    public function destroy(Sale $sale){

    }
    
}
