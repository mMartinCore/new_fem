<?php 

use App\Http\Controllers\UserController;  

Route::get('users/user-list/{id?}', [UserController::class, 'userList'])->name('users.user-list');
Route::resource('users',UserController::class)->except(['index'])->except(['create']);

  