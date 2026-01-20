<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Beranda']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'Tentang']);
});

Route::get('/post', function () {
    return view('post', ['title' => 'ForNews']);
});

Route::get('/gallery', function () {
    return view('gallery', ['title' => 'Galeri']);
});

Route::get('/bulletin', function () {
    return view('bulletin', ['title' => 'ForSight']);
});

Route::get('/announcement', function () {
    return view('announcement', ['title' => 'Pengumuman']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Kontak']);
});

Route::get('/post-image/{filename}', function ($filename) {
    $path = storage_path('app/private/post-image/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('post.image');

