<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use App\Models\Post;
use Livewire\Component;

#[Layout('components.layout')]
class FornewsShow extends Component
{
    public $slug;
    public $post;
    public $recentPosts;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->post = Post::with('author')
            ->where('slug', $slug)
            ->whereNotNull('published_at')
            ->firstOrFail();

        $this->recentPosts = Post::query()
            ->where('id', '!=', $this->post->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.fornews-show');
    }
}