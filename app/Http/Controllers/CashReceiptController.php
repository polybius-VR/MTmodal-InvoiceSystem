<?php

namespace App\Http\Controllers;

use App\CashReceipt;
use App\ReceivableInvoice;
use App\Sale;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class CashReceiptController extends Controller
{
    public function index(){
        $cashReceipts = CashReceipt::all();    
        return view('cashReceipts.index', compact('cashReceipts'));
    }

    public function create(){
        $invoices = ReceivableInvoice::pluck('number_id', 'number_id');
        return view('cashReceipts.create', compact('invoices'));
    }

    public function getIndex(ReceivableInvoice $invoice){
        //error_log($invoice->number_id . " " . $invoice->date_of_issue);
        //$invoices = ReceivableInvoice::pluck('number_id', 'number_id');
        $sale = Sale::get()->where('invoice_id', '=', $invoice->number_id)->first();
        return view('cashReceipts.create', compact('invoice', 'sale'));
    }

    public function store(){
        $rules = array(
            'number_id' => 'required|unique:cash_receipts',
            'date_of_issue' => 'required',
            'invoice_id' => 'required',
            'amount' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cashReceipts/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $cashReceipt = new CashReceipt;
            $cashReceipt->number_id = Request::get('number_id');
            $cashReceipt->date_of_issue = Request::get('date_of_issue');
            $cashReceipt->invoice_id = Request::get('invoice_id');
            $cashReceipt->amount = Request::get('amount');
            $cashReceipt->save();

            // redirect
            Session::flash('message', 'Successfully created cashReceipt!');
            return Redirect::to('sales');
        }
    }

    public function show(CashReceipt $cashReceipt){
        return view('cashReceipts.show', compact('cashReceipt'));
    }

    public function edit(CashReceipt $cashReceipt){
        $invoices = ReceivableInvoice::pluck('number_id', 'number_id');
        return view('cashReceipts.edit', compact('cashReceipt', 'invoices'));
    }

    public function update(CashReceipt $cashReceipt)
    {
        // validate
        $rules = array(
            'number_id' => 'required|unique:cash_receipts,number_id,'.$cashReceipt->number_id.',number_id',
            'date_of_issue' => 'required',
            'invoice_id' => 'required',
            'amount' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cashReceipts/' . $cashReceipt->number_id . '/edit')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $cashReceipt->number_id = Request::get('number_id');
            $cashReceipt->date_of_issue = Request::get('date_of_issue');
            $cashReceipt->invoice_id = Request::get('invoice_id');
            $cashReceipt->amount = Request::get('amount');
            $cashReceipt->save();

            // redirect
            Session::flash('message', 'Successfully updated cashReceipt!');
            return Redirect::to('cashReceipts');
        }
    }

    public function destroy(CashReceipt $cashReceipt){

    }
}
