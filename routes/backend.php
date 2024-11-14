<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Web\Backend\DashboardController;



//  Route::middleware(['auth', 'admin'])->group(function () {
//         Route::get('/dashboard', function () {
//                 return view('dashboard');
//             })->name('dashboard');
//         }); 
        
        


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admindashboard', [DashboardController::class, 'index'])->name('dashboard');

});
