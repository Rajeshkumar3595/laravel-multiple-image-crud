<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[PostController::class , 'index']);
Route::get('create',[PostController::class , 'create'])->name('create');
Route::post('post',[PostController::class , 'store'])->name('store');
Route::delete('delete/{id}',[PostController::class, 'destroy']);
Route::get('edit/{id}',[PostController::class, 'edit']);
Route::put('update/{id}',[PostController::class, 'update']);



Route::delete('profile_delete/{id}',[PostController::class, 'profile_delete']);
Route::delete('image_delete/{id}',[PostController::class, 'image_delete']);
