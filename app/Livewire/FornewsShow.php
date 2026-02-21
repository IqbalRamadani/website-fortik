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

        // 1. Eksekusi scope published() agar draft DAN artikel terjadwal terblokir mutlak.
        $this->post = Post::published()
            ->with('author')
            ->where('slug', $slug)
            ->firstOrFail();

        // 2. Gunakan scope yang sama untuk sidebar, cegah N+1, gunakan helper latest()
        $this->recentPosts = Post::published()
            ->with('author')
            ->where('id', '!=', $this->post->id)
            ->latest('published_at') 
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.fornews-show')
            ->title($this->post->title . ' - FORNEWS Terkini');
    }
}