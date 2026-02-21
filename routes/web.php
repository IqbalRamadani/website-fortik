<?php

use App\Livewire\FornewsIndex;
use App\Livewire\FornewsShow;
use App\Livewire\ForsightIndex;
use App\Livewire\ForsightShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda', ['title' => 'Beranda']);
});

Route::get('/sejarah', function () {
    return view('sejarah', ['title' => 'Sejarah']);
});

Route::get('/visi-misi-tujuan', function () {
    return view('visi-misi-tujuan', ['title' => 'Visi Misi Tujuan']);
});

Route::get('/lambang', function () {
    return view('lambang', ['title' => 'Lambang']);
});

Route::get('/struktur-organisasi', function () {
    return view('struktur-organisasi', ['title' => 'Struktur Organisasi']);
});

Route::get('/fornews', function () {
    return view('fornews', ['title' => 'ForNews']);
});

Route::get('/galeri', function () {
    return view('galeri', ['title' => 'Galeri']);
});

Route::get('/forsight', function () {
    return view('forsight', ['title' => 'ForSight']);
});

Route::get('/pengumuman', function () {
    return view('pengumuman', ['title' => 'Pengumuman']);
});

Route::get('/fornews', FornewsIndex::class)->name('fornews.index');
Route::get('/fornews/{slug}', FornewsShow::class)->name('fornews.show');

Route::get('/forsight', ForsightIndex::class)->name('forsight.index');
Route::get('/forsight/{slug}', ForsightShow::class)->name('forsight.show');

