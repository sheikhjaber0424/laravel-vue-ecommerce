<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
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

//Category
Route::get('/category-index', [CategoryController::class, 'index']);
Route::post('/update-category', [CategoryController::class, 'store']);

//Category Attribute
Route::get('/category-attribute', [CategoryController::class, 'indexCategoryAttribute']);
Route::post('/update-category-attribute', [CategoryController::class, 'storeCategoryAttribute']);

//brand
Route::get('/brand', [BrandController::class, 'index']);
Route::post('/update-brand', [BrandController::class, 'store']);


//Delete Data
Route::get('/deleteData/{id?}/{table?}', [DashboardController::class, 'deleteData']);
