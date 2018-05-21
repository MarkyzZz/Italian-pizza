<?php


Route::get('/', 'PageController@index')->name('home');
Route::get('/about_us','PageController@about');
Route::get('/admin','PageController@admin');

Route::get('/menu','MenuController@index');

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
