<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Client;

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
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('clients/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $client = new Client;
            $client->name       = Input::get('name');
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

    }

    public function destroy(Client $client){

    }
}
