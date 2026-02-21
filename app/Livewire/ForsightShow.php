<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use App\Models\Bulletin;
use Livewire\Component;

#[Layout('components.layout')]
class ForsightShow extends Component
{
    public $slug;
    public $bulletin;
    public $recentBulletins;

    public function mount($slug)
    {
        $this->slug = $slug;

        // 1. Eksekusi scope published() agar draft DAN artikel terjadwal terblokir mutlak.
        $this->bulletin = Bulletin::published()
            ->with('author')
            ->where('slug', $slug)
            ->firstOrFail();

        // 2. Gunakan scope yang sama untuk sidebar, cegah N+1, gunakan helper latest()
        $this->recentBulletins = Bulletin::published()
            ->with('author')
            ->where('id', '!=', $this->bulletin->id)
            ->latest('published_at') 
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.forsight-show')
            ->title($this->bulletin->title . ' - FORSIGHT Terkini');
    }
}