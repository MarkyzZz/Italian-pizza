<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contact;
use App\Http\Requests\ConctactRequest;

class ContactsController extends Controller
{
    public function store(ConctactRequest $request)
    {
    	$contact = new Contact();
    	$contact->name = Input::get('name');
    	$contact->email = Input::get('email');
    	$contact->message = Input::get('message');

    	$contact->save();

    	return redirect('/');
    }
}
