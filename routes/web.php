<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function (){    
    Route::get('user', [UserController::class, 'index'])->name('index');
    Route::put('user', [UserController::class, 'update'])->name('update');    
    
});
