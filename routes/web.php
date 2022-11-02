<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


// Route::get('/', function () {
//     return view('product');
// });

Route::get('/',[ProductController::class,'products'])->name('products');
