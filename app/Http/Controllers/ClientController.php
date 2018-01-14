<?php

namespace App\Http\Controllers;

Use App\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();    
        return view('clients.index', compact('clients'));
    }

    public function create(){
        return view('clients.create');
        //return view::make('clients.create');
    }

    public function store(){
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clients/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $client = new Client;
            $client->name       = Request::get('name');
            $client->save();

            // redirect
            Session::flash('message', 'Successfully created client!');
            return Redirect::to('clients');
        }
    }

    public function show(Client $client){
        //$client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client){
        return view('clients.edit', compact('client'));
    }

    public function update(Client $client)
    {
        // validate
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clients/' . $client->id . '/edit')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $client->name       = Request::get('name');
            $client->save();

            // redirect
            Session::flash('message', 'Successfully updated client!');
            return Redirect::to('clients');
        }
    }

    public function destroy(Client $client){

    }
}
