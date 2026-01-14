<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Beranda']);
});

Route::get('/tentang', function () {
    return view('about', ['title' => 'Tentang']);
});

Route::get('/berita', function () {
    return view('post', ['title' => 'Berita']);
});

Route::get('/galeri', function () {
    return view('gallery', ['title' => 'Galeri']);
});

Route::get('/bulletin', function () {
    return view('bulletin', ['title' => 'ForSight']);
});

Route::get('/pengumuman', function () {
    return view('announcement', ['title' => 'Pengumuman']);
});

Route::get('/kontak', function () {
    return view('contact', ['title' => 'Kontak']);
});

