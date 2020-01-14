<?php
Route::get('/', 'Controller@index')->name('home');
Route::get('/checkout/{id}', 'Controller@checkout')->name('checkout');
Route::post('/charge', 'Controller@charge')->name('charge');
