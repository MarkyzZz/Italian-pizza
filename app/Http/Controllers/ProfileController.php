<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ProductRequest;
use App\User;
use App\Product;
use App\Order;
use App\Transaction;


class ProfileController extends Controller
{
    public function users()
    {
        $users = User::all()->except(Auth::id());

        return view('profile.users_page', compact('users'));
    }

    public function createUser()
    {
    	return view('profile.users_createOrUpdate');
    }

    public function editUser(User $user)
    {
    	return view('profile.users_createOrUpdate', compact('user'));
    }

    public function updateUser(RegistrationRequest $request, User $user)
    {
        $user->email = $request->get('email');
        if(!empty($request->get('password'))) {
            $user->password = bcrypt($request->get('password'));
        }
        $user->full_name = $request->get('full_name');
        $user->phone = $request->get('phone');
        $user->city = $request->get('city');
        $user->street = $request->get('street');
        $user->block_number = $request->get('block_no');
        $user->apartment_number = $request->get('apartment_no');
        $user->doorcode = $request->get('door_code');
        $user->additional_info = $request->get('additional_info');
        $user->role_id = $request->get('role');

        $user->save();

        return back()->with(['success' => "User successfully updated!"]);
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

    public function destroyUser(User $user)
    {
        User::destroy($user->id);

        return back()->with(['success' => 'User has been deleted!']);
    }

    public function products()
    {
    	$products = Product::all();

    	return view('profile.products_page', compact('products'));
    }

    public function createProduct()
    {
    	return view('profile.products_createOrUpdate');
    }

    public function editProduct(Product $product)
    {
        return view('profile.products_createOrUpdate', compact('product'));
    }

    public function updateProduct(ProductRequest $request, Product $product)
    {
        if($request->hasFile('img')){
            $image = $request->file('img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/menu');
            $image->move($destinationPath, $name);
            $product->image_path = '/img/menu/' . $name;
        }
        
            $product->name = $request->get('name');
            $product->description = $request->get('description');
            $product->price = $request->get('price');
            

        $product->save();

        return back()->with(['success' => "Product successfully updated!"]);
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

    public function destroyProduct(Product $product)
    {
        if ($product->orders()->count() > 0) {
            return back()->with(['fail' => "This product has orders and cannot be deleted!"]);
        }
        $filename = public_path() . $product->image_path;
        if(file_exists($filename))  File::delete($filename);
        Product::destroy($product->id);

        return back()->with(['success' => 'Product has been deleted!']);
    }

    public function orders()
    {
    	 $orders = Order::distinct()
    	 ->select('orders.transaction_id','users.full_name','transactions.status')
    	 ->join('users', 'orders.user_id','=','users.id')
    	 ->join('transactions', 'orders.transaction_id','=','transactions.id')
         ->orderBy('transactions.status')
         ->orderBy('orders.transaction_id', 'DESC')
    	 ->get();

    	return view('profile.orders', compact('orders'));
    }

    public function showOrder(Transaction $transaction)
    {
        // Select all fields related to user 
        $order_info = DB::select("    
            SELECT DISTINCT o.transaction_id, u.full_name, u.street, u.city,
                CASE 
                    WHEN t.payment_token IS NULL THEN 'cash'
                    ELSE 'e-Payment'
                END as payment_type,
            t.`status`,t.created_at
            FROM ORDERS o 
                INNER JOIN users u ON (o.user_id = u.id)
                INNER JOIN transactions t ON (o.transaction_id = t.id)
            WHERE transaction_id = " . $transaction->id . ";
            ");
        $order_info = collect($order_info)->first();

        // Select every name of product,quantity, price and total price where transaction 
        // is the current one
        $order_details = DB::select("
            SELECT p.name, op.quantity, p.price, 
            SUM(op.quantity * p.price) as total
            from order_product op 
            INNER JOIN products p  ON (op.product_id = p.id)
            INNER JOIN orders o ON (op.order_id = o.id)
            WHERE o.transaction_id = " . $transaction->id . "
            GROUP BY p.name WITH ROLLUP;
            ");

        $total = end($order_details)->total;
        
        // Group by rollup will add another row with a null value and a total of subtotals
        // I will need the subtotal row only and the rest is useless to me 
        // This is why i'm deleting the last element after i save the sum
        
        array_pop($order_details);

        // dd($order_details);
        return view('profile.order_view', compact('order_info','order_details','total'));
    }

    public function closeOrder(Transaction $transaction)
    {
        $transaction->status = 'closed';
        $transaction->save();

        return redirect()->route('orders')->with(['success' => "Order successfully closed!"]);
    }

    public function openOrder(Transaction $transaction)
    {   
        $transaction->status = 'open';
        $transaction->save();

        return redirect()->route('orders')->with(['success' => "Order has been successfully reopen!"]);
    }
}
