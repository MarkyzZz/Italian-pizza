<?php

Route::get('/', 'PageController@index')->name('home');
Route::get('/about_us','PageController@about');

Route::get('/menu','MenuController@index');
Route::get('/profile','PageController@profile')->middleware('auth');

Route::get('profile/users', 'ProfileController@users')->middleware('auth','admin');
Route::get('profile/users/create', 'ProfileController@createUser')->middleware('auth','admin');
Route::post('profile/users', 'ProfileController@storeUser')->middleware('auth','admin');
Route::get('/profile/user/{user}', 'ProfileController@editUser')->middleware('auth','admin');
Route::post('/profile/user/{user}/edit', 'ProfileController@updateUser')->middleware('auth','admin');
Route::post('/profile/user/{user}/delete', 'ProfileController@destroyUser')->middleware('auth','admin');

Route::get('profile/products', 'ProfileController@products')->middleware('auth', 'admin');
Route::get('/profile/products/create', 'ProfileController@createProduct')->middleware('auth', 'admin');
Route::post('/profile/products', 'ProfileController@storeProduct')->middleware('auth', 'admin');
Route::get('/profile/product/{product}', 'ProfileController@editProduct')->middleware('auth', 'admin');
Route::post('/profile/product/{product}/edit', 'ProfileController@updateProduct')->middleware('auth', 'admin');
Route::post('/profile/product/{product}/delete', 'ProfileController@destroyProduct')->middleware('auth', 'admin');

Route::get('profile/orders', 'ProfileController@orders')->name('orders')->middleware('auth','operator');
Route::get('profile/order/{transaction}', 'ProfileController@showOrder')->middleware('auth','operator');
Route::post('profile/order/{transaction}/close', 'ProfileController@closeOrder')->middleware('auth','operator');
Route::post('profile/order/{transaction}/open', 'ProfileController@openOrder')->middleware('auth','operator');

Route::get('/cart','CartController@index');
Route::get('cart/destroy','CartController@destroy');
Route::get('/cart/delete/{product}','CartController@delete');
Route::post('/cart/update','CartController@update');
Route::post('/cart/{product}', 'CartController@add');

Route::get('user/create','UsersController@create')->name('delivery_form');;
Route::post('user/store','UsersController@store');

Route::get('/contacts', 'ContactsController@create');
Route::post('/contacts', 'ContactsController@store');

Route::get('order/create','OrderController@create');
Route::post('order/store','OrderController@store')->middleware('duplicate_order');

Route::get('/auth','AuthentificationController@authPage')->middleware('guest')->name('login');

Route::post('/login', 'AuthentificationController@login');
Route::get('/logout','AuthentificationController@logout');
Route::post('/register', 'AuthentificationController@register');



