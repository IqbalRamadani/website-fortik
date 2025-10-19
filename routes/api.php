<?php

use App\Http\Controllers\KelulusanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:60,1'])->group(function () {
    Route::post('/cek-kelulusan', [KelulusanController::class, 'cekKelulusan'])
        ->name('api.cek-kelulusan');
});
