<?php

use Illuminate\Support\Facades\Route;

 
use App\Http\Controllers\ItemController;

// Route::group([
//     'domain'    => '{b}.mlm.localhost'
// ],function(){
//     dd(config('app.short_url'));
//     Route::get('/', function () {
//         return 'I AM OFFICE OWNER B';
//     });
// });

// Route::group([
//     'domain'    => '{x}.mlm.localhost'
// ],function(){
//     Route::get('/', function () {
//         return 'I AM   OWNER x';
//     });
// });








Route::resource('items', ItemController::class);





Route::get('/', function () {
    return view('welcome');
});

Route::get('items/create', function () {
    dd(config('app.short_url'));

    return view('items.create');
});
 











Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





















// <VirtualHost *:80>
//     DocumentRoot "E:/xampp/htdocs/new_fem/public"
//     ServerName mlm.localhostx
//     ServerAlias *.mlm.localhostx
//     <Directory "E:/xampp/htdocs/new_fem/public">
//         Order allow,deny
//         Allow from all
//     </Directory>
// </VirtualHost>