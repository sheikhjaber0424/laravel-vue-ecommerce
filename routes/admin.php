<?php

use App\Http\Controllers\admin\AttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomeBannerController;
use App\Http\Controllers\admin\ProfileController;

// Route::get('/dashboard', function () {
//     return view('admin.index');
// });

Route::get('/dashboard', [DashboardController::class, 'index']);
//Profile Section
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/saveProfile', [ProfileController::class, 'store']);


//HomeBanner Section
Route::get('/home-banner', [HomeBannerController::class, 'index']);
Route::post('/update-home-banner', [HomeBannerController::class, 'store']);

//HomeBanner Section
Route::get('/attribute-name', [AttributeController::class, 'attributeNameIndex']);
Route::post('/update-attribute-name', [AttributeController::class, 'storeAttributeName']);

//Attribute
Route::get('/attribute-value', [AttributeController::class, 'attributeValueIndex']);
Route::post('/update-attribute-value', [AttributeController::class, 'storeAttributeValue']);




//Delete Data
Route::get('/deleteData/{id?}/{table?}', [DashboardController::class, 'deleteData']);
