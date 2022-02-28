<?php 

use App\Http\Controllers\PackageController;  

route::get('packages/list/{id?}', [PackageController::class, 'list'])->name('packages.list');
Route::resource('packages',PackageController::class);

  