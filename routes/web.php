<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\ShowTweets;
use App\Livewire\User\UploadPhoto;


Route::get('/tweets', ShowTweets::class)->name('tweets.index')->middleware('auth');

Route::get('/upload', UploadPhoto::class)->name('upload.foto.user')->middleware('auth');


Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
