<?php

namespace App\Http\Controllers;

use App\ReceivableInvoice;
use App\Client;
use App\Currency;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ReceivableInvoiceController extends Controller
{
    public function index(){
        $clients = Client::pluck('name','id');
        $receivableInvoices = ReceivableInvoice::get();
        return view('receivableInvoices.index', compact('receivableInvoices', 'clients'));
    }

    public function create(){
        $clients = Client::pluck('name','id');
        $currencies = Currency::pluck('currency', 'id');
        return view('receivableInvoices.create', compact('clients', 'currencies'));
        //return view::make('clients.create');
    }

    public function store(){
        $rules = array(
            'number_id' => 'required|unique:receivable_invoices',
            'date_of_issue' => 'required',
            'client_id' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('receivableInvoices/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $receivableInvoices = new ReceivableInvoice;
            $receivableInvoices->number_id = Request::get('number_id');
            $receivableInvoices->date_of_issue = Request::get('date_of_issue');
            //$receivableInvoices->client_id = Request::get('client_id');
            $receivableInvoices->currency_id = Request::get('currency_id');
            $receivableInvoices->amount = Request::get('amount');
            $client = Client::find(Request::get('client_id'));
            $receivableInvoices->client()->associate($client);
            $receivableInvoices->save();

            // redirect
            Session::flash('message', 'Successfully created Invoice!');
            return Redirect::to('receivableInvoices');
        }
    }

    public function show(ReceivableInvoice $receivableInvoice){
        $client = Client::find($receivableInvoice->client_id);
        $currency = Currency::find($receivableInvoice->currency_id);
        return view('receivableInvoices.show', compact('receivableInvoice', 'client', 'currency'));
    }

    public function edit(ReceivableInvoice $receivableInvoice){
        $clients = Client::pluck('name','id');
        $currencies = Currency::pluck('currency', 'id');
        return view('receivableInvoices.edit', compact('receivableInvoice', 'clients', 'currencies'));
    }

    public function update(ReceivableInvoice $receivableInvoice)
    {
        // validate
        $rules = array(
            'number_id' => 'required|unique:receivable_invoices,number_id,'.$receivableInvoice->number_id.',number_id',
            'date_of_issue' => 'required',
            'client_id' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('receivableInvoices/' . $receivableInvoice->number_id . '/edit')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $receivableInvoice->number_id = Request::get('number_id');
            $receivableInvoice->date_of_issue = Request::get('date_of_issue');
            //$receivableInvoices->client_id = Request::get('client_id');
            $receivableInvoice->currency_id = Request::get('currency_id');
            $receivableInvoice->amount = Request::get('amount');
            $client = Client::find(Request::get('client_id'));
            $receivableInvoice->client()->associate($client);
            $receivableInvoice->save();

            // redirect
            Session::flash('message', 'Successfully updated client!');
            return Redirect::to('receivableInvoices');
        }
    }

    public function destroy(Client $client){

    }
}
