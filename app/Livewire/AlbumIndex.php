<?php

namespace App\Livewire;

use App\Models\Album;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout')]
class AlbumIndex extends Component
{
    public function render()
    {
        // Cache daftar album selama 24 jam untuk membunuh beban database.
        // Kita gunakan latest() agar album terbaru selalu di atas.
        $albums = Cache::remember('albums.index', 86400, function () {
            return Album::latest()->get();
        });

        return view('livewire.album-index', compact('albums'));
    }
}
