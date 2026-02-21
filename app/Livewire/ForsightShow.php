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
        $this->bulletin = Bulletin::with('author')
            ->where('slug', $slug)
            ->whereNotNull('published_at')
            ->firstOrFail();

        $this->recentBulletins = Bulletin::query()
            ->where('id', '!=', $this->bulletin->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.forsight-show');
    }
}