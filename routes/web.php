<?php

// Route::get('/admin', function () {
//     return view('templates/admin_');
// });

Route::get('/', 'PageController@index');
Route::get('/about_us','PageController@about');

Route::get('/menu','MenuController@index');

Route::get('/cart','CartController@index');
Route::get('cart/destroy','CartController@destroy');
Route::get('/cart/delete/{product}','CartController@delete');
Route::post('/cart/update','CartController@update');
Route::post('/cart/{product}', 'CartController@add');

Route::get('/cart/user/create','UsersController@create');
Route::post('/cart/user/store','UsersController@store');

Route::get('/contacts', 'ContactsController@create');
Route::post('/contacts', 'ContactsController@store');

