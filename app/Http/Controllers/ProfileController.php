<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ProductRequest;
use App\User;
use App\Product;
use App\Order;


class ProfileController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('profile.users_page', compact('users'));
    }

    public function createUser()
    {
    	return view('profile.users_create');
    }

    public function storeUser(RegistrationRequest $request)
    {
    	$user = new User([
            'email' =>    $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'full_name' => $request->get('full_name'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'street' => $request->get('street'),
            'block_number' => $request->get('block_no'),
            'apartment_number' => $request->get('apartment_no'),
            'doorcode' => $request->get('door_code'),
            'additional_info' => $request->get('additional_info'),
            'role_id' => $request->get('role')       
        ]);

        $user->save();

        return back()->with(['success' => 'User successfully created!']);

    }

    public function products()
    {
    	$products = Product::all();

    	return view('profile.products_page', compact('products'));
    }

    public function createProduct()
    {
    	return view('profile.products_create');
    }

    public function storeProduct(ProductRequest $request)
    {
    	$image = $request->file('img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/menu');
        $image->move($destinationPath, $name);

    	$product = new Product([
    		'name' => $request->get('name'),
    		'description' => $request->get('description'),
    		'price' => $request->get('price'),
    		'image_path' => '/img/menu/' . $name
    	]);
    	$product->save();

    	return back()->with(['success' => 'Product has been successfully created!']);
    }

    public function orders()
    {
    	 $orders = Order::distinct()
    	 ->select('orders.transaction_id','users.full_name','transactions.status')
    	 ->join('users', 'orders.user_id','=','users.id')
    	 ->join('transactions', 'orders.transaction_id','=','transactions.id')
    	 ->get();

    	return view('profile.orders', compact('orders'));
    }
}
