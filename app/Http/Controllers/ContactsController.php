<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contact;
use App\Http\Requests\ContactsRequest;

class ContactsController extends Controller
{
    /**
     * Check if validator fails and if it does return json response with errors
     * Otherwise save the data
     * @param  ContactsRequest $request 
     * @return
     */
    public function store(ContactsRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()){
            return response()->json(['errors' => $request->validator->messages()]);
        }
    	$contact = new Contact();
    	$contact->name = Input::get('name');
    	$contact->email = Input::get('email');
    	$contact->message = Input::get('message');

    	$contact->save();
    	return response()->json(['success' => 'Success! Your message has been sent!']);
    }

    public function create()
    {
    	return view('contacts');
    }
}
