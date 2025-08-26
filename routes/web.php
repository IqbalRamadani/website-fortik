<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

Route::get('/news', function () {
    return view('news', ['title' => 'News']);
});

