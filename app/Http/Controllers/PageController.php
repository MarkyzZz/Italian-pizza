<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
    	return view('homepage')->with(['success'=> 'You have successfully logged in!']);
    }

    public function about()
    {
    	return view('about_us');
    }

    public function profile()
    {
    	return view('profile.admin_profile');
    }
}
