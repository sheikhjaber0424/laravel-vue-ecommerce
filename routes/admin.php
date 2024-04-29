<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;


Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/dashboard', [DashboardController::class, 'index']);
