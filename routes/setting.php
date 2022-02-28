<?php
use App\Http\Controllers\ContactsettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginsettingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegistersettingController;
use App\Http\Controllers\RoleController;
// use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 
 

    // Teams
    // Route::post('teams/media', [TeamController::class, 'storeMedia'])->name('teams.storeMedia');
   // Route::resource('teams', TeamController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contactsettings
    Route::resource('contactsettings', ContactsettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Registersettingd
    Route::post('registersettings/media', [RegistersettingController::class, 'storeMedia'])->name('registersettings.storeMedia');

    Route::resource('registersettings', RegistersettingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Loginsettings
    Route::post('loginsettings/media', [LoginsettingController::class, 'storeMedia'])->name('loginsettings.storeMedia');
    Route::resource('loginsettings', LoginsettingController::class, ['except' => ['store', 'update', 'destroy']]);
 
 

        // // Permissions
    // Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // // Roles
    // Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);
 