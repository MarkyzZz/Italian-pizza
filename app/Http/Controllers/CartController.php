<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Shows everything inside the cart
     * @return  cart view
     */ 
	public function index()
	{	
		return view('cart');
	}

    /**
     * Adds new product in cart
     * @param Product $product
     */
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
    /**
     * Updates current cart with new values
     * @param  Request $request 
     * @return            
     */
    public function update(Request $request)
    {   
        foreach ($request->all()['amount'] as $key => $value) {
             $cartItem = Cart::search(function ($cartItem) use ($key){
                return $cartItem->id === $key;
             });
            Cart::update($cartItem->first()->rowId, $value);
        }
        return redirect()->to('user/create');
    }
    /**
     * Deletes the product from the cart
     * @param  Product $product 
     * @return
     */
    public function delete(Product $product)
    {
        $cartItem = Cart::search(function ($cartItem) use ($product){
            return $cartItem->id === $product->id;
        });
        Cart::remove($cartItem->first()->rowId);

        return redirect()->back();
    }

    /**
     * Destroys the current cart instance, removing all items from it
     * @return 
     */
    public function destroy()
    {
    	if(Cart::count() > 0) Cart::destroy();
		return redirect()->back();
    }
}
