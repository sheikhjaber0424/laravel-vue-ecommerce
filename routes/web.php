<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\auth\AuthController as AuthAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.index');
// });
Route::get('/login', function () {
    return view('auth.signIn');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});


Route::get('/createAdmin', [AuthController::class, 'createAdmin']);

Route::post('/user-login', [AuthAuthController::class, 'userLogin']);
