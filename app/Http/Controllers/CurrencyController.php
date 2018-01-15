<?php

namespace App\Http\Controllers;

Use App\Currency;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    public function index(){
        $currencies = Currency::all();    
        return view('currencies.index', compact('currencies'));
    }

    public function create(){
        return view('currencies.create');
    }

    public function store(){
        $rules = array(
            'currency' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('currencies/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $currency = new Currency;
            $currency->currency = Request::get('currency');
            $currency->save();

            // redirect
            Session::flash('message', 'Successfully created currency!');
            return Redirect::to('currencies');
        }
    }

    public function show(Currency $currency){
        return view('currencies.show', compact('currency'));
    }

    public function edit(Currency $currency){
        return view('currencies.edit', compact('currency'));
    }

    public function update(Currency $currency)
    {
        // validate
        $rules = array(
            'currency'  => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('currencies/' . $currency->id . '/edit')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $currency->currency = Request::get('currency');
            $currency->save();

            // redirect
            Session::flash('message', 'Successfully updated currency!');
            return Redirect::to('currencies');
        }
    }

    public function destroy(Currency $currency){

    }
}
