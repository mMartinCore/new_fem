<?php 

use App\Http\Controllers\MergeController;  
Route::get('merges/merge-list/{id?}', [MergeController::class, 'index'])->name('merges.merge-list');

Route::resource('merges',MergeController::class)->except(['index']);

  