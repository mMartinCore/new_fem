<?php 

use App\Http\Controllers\BuyformeController;  

Route::get('buyformes/payment-intent/{id}', [BuyformeController::class, 'paymentIntent'])->name('buyformes.payment-intent');

Route::post('buyformes/buyformePost', [BuyformeController::class, 'buyformePost'])->name('buyforme.buyformePost');

Route::get('buyformes/index/{id?}', [BuyformeController::class, 'index'])->name('buyformes.index');
Route::resource('buyformes',BuyformeController::class)->except(['index']);

  