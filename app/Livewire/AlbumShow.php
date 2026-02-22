<?php

namespace App\Livewire;

use App\Models\Album;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout')]
class AlbumShow extends Component
{
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function render()
    {
        $album = Cache::remember("album.{$this->slug}", 86400, function () {
            return Album::with('photos')
            ->where('slug', $this->slug)
            ->firstOrFail();
        });

        return view('livewire.album-show', compact('album'));
    }
}
