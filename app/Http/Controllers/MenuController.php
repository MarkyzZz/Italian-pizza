<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;

class MenuController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('menu', compact('products'));
    }
}
