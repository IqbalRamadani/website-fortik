<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layout')]
class FornewsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::published()
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(12); // 9 untuk desktop, 4 untuk mobile

        return view('livewire.fornews-index', [
            'posts' => $posts
        ]);
    }
}