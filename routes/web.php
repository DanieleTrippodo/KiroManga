<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');


Route::group(['middleware' => ['auth', 'admin']], function () {
    // Rotte protette per gli admin
});
