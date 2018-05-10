<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Cart;
use App\Product;

class CartController extends Controller
{
	public function index()
	{	
		return view('cart');
	}

    public function add(Product $product)	
    {
    	Cart::add([
    		'id' => $product->id,
    		'name' => $product->name,
    		'options' => 
    			[
    				'image' => $product->image_path,
    			],
    		'qty' => Input::get('amount'),
    		'price' => $product->price
    	]);
    	$cart = Cart::content();
    	return redirect()->back();
    }

    public function update(Request $request)
    {   
        foreach ($request->all()['amount'] as $key => $value) {
             $cartItem = Cart::search(function ($cartItem) use ($key){
                return $cartItem->id === $key;
             });
            Cart::update($cartItem->first()->rowId, $value);
        }
        return redirect()->to('/cart/user/create');
    }

    public function delete(Product $product)
    {
        $cartItem = Cart::search(function ($cartItem) use ($product){
            return $cartItem->id === $product->id;
        });
        Cart::remove($cartItem->first()->rowId);

        return redirect()->back();
    }

    public function destroy()
    {
    	if(Cart::count() > 0) Cart::destroy();
		return redirect()->back();
    }
}
