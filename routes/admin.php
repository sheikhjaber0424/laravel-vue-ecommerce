<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProfileController;

// Route::get('/dashboard', function () {
//     return view('admin.index');
// });
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/saveProfile', [ProfileController::class, 'store']);
