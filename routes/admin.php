<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\Backend\AdminController::class,'index'])->name('admin');

Route::resource('categories',\App\Http\Controllers\Backend\CategorieController::class);

Route::resource('produits',\App\Http\Controllers\Backend\ProduitController::class);
