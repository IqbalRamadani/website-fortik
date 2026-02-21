<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use App\Models\Bulletin;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layout')]
class ForsightIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $bulletins = Bulletin::published()
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(12); // 9 untuk desktop, 4 untuk mobile

        return view('livewire.forsight-index', [
            'bulletins' => $bulletins
        ]);
    }
}