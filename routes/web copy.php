<?php

use Illuminate\Support\Facades\Route;

 
use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);





Route::get('/', function () {
    return view('welcome');
});

Route::get('items/create', function () {
    

    return view('items.create');
});
 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
