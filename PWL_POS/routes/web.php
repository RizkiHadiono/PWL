<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;


Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/level', [LevelController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
