<?php

namespace App\Http\Controllers;

use App\VoidedInvoice;
use App\ReceivableInvoice;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class VoidedInvoiceController extends Controller
{
    public function index(){
        $voidedInvoices = VoidedInvoice::all();    
        return view('voidedInvoices.index', compact('voidedInvoices'));
    }

    public function create(){
        $invoices = ReceivableInvoice::pluck('number_id', 'number_id');
        return view('voidedInvoices.create', compact('invoices'));
    }

    public function store(){
        $rules = array(
            'invoice_id' => 'required|unique:voided_invoices',
            'date_voided' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('voidedInvoices/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $voidedInvoice = new VoidedInvoice;
            $voidedInvoice->invoice_id = Request::get('invoice_id');
            $voidedInvoice->date_voided = Request::get('date_voided');
            $voidedInvoice->description = Request::get('description');
            $voidedInvoice->save();

            // redirect
            Session::flash('message', 'Successfully created voidedInvoice!');
            return Redirect::to('voidedInvoices');
        }
    }

    public function show(VoidedInvoice $voidedInvoice){        
        return view('voidedInvoices.show', compact('voidedInvoice'));
    }
}
