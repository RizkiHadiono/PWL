<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [WelcomeController::class,'hello']); 

Route::get('/hai', function () {
    return 'Selamat Datang';
});

Route::get('/about', function () {
    return 'Nama : Mokhamad Rizki Hadiono Singgih <br> NIM : 244107020198 <br> Kelas : TI-2F';
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function
($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

Route::get('articles/{id}/comments/{commentId}', function ($id, $commentId) {
    return 'Halaman Artikel dengan ID'.$id." Komentar ke-: ".$commentId;
});  

Route::get('/user/{name?}', function ($name=null) {
    return 'Nama saya '.$name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});

Route::redirect('/here', '/there');

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

use App\Http\Controllers\PhotoController;
Route::resource('photos', PhotoController::class);

Route::get('/greeting', [WelcomeController::class, 'greeting']);