<?php

Route::get('/', function () {
    return view('homepage');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/admin', function () {
    return view('templates/admin_');
});
Route::get('/order/step2', function(){
	return view('delivery_form');
});

Route::get('/about_us',function(){
	return view('about_us');
});

Route::get('/contacts', 'ContactsController@create');
Route::post('/contacts', 'ContactsController@store');

