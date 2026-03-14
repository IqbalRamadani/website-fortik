<?php

use App\Http\Controllers\HomeController;
use App\Livewire\AlbumIndex;
use App\Livewire\AlbumShow;
use App\Livewire\AgendaIndex;
// use App\Livewire\CekStatus;
// use App\Livewire\FormPendaftaran;
use App\Livewire\FornewsIndex;
use App\Livewire\FornewsShow;
use App\Livewire\ForsightIndex;
use App\Livewire\ForsightShow;
use App\Livewire\Setup;
use App\Livewire\StrukturOrganisasi;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/sejarah', function () {
    return view('sejarah', ['title' => 'Sejarah']);
});

Route::get('/visi-misi-tujuan', function () {
    return view('visi-misi-tujuan', ['title' => 'Visi Misi Tujuan']);
});

Route::get('/lambang', function () {
    return view('lambang', ['title' => 'Lambang']);
});

Route::get('/struktur-organisasi', StrukturOrganisasi::class);

Route::get('/webinar', function () {
    return view('webinar', ['title' => 'Webinar']);
});

// Route::get('/pengumuman', function () {
//     return view('pengumuman', ['title' => 'Pengumuman']);
// });

Route::get('/galeri', AlbumIndex::class)->name('album.index');
Route::get('/galeri/{slug}', AlbumShow::class)->name('album.show');

Route::get('/agenda', AgendaIndex::class)->name('agenda');
// Route::get('/agenda/{agenda}/daftar', FormPendaftaran::class)->name('agenda.daftar');
// Route::get('/cek-status', CekStatus::class)->name('cek.status');

Route::get('/fornews', FornewsIndex::class)->name('fornews.index');
Route::get('/fornews/{slug}', FornewsShow::class)->name('fornews.show');

Route::get('/forsight', ForsightIndex::class)->name('forsight.index');
Route::get('/forsight/{slug}', ForsightShow::class)->name('forsight.show');

Route::get('/setup', Setup::class)->name('setup');