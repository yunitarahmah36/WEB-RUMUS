<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UmkmController;

Route::get('/', function () {
    return view('welcome');

Route::get('/umkm', [UmkmController::class, 'index']);
});
