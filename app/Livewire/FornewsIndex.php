<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class FornewsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $posts = Post::with('author')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(9) // 9 untuk desktop, 4 untuk mobile
            ->through(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'author' => $post->author->name,
                    'published_at' => $post->published_at->format('d F Y'),
                    'content_preview' => \Illuminate\Support\Str::limit(strip_tags($post->content), 150, '...'),
                    'image' => $post->image ? asset('storage/' . $post->image) : null,
                ];
            });

        return view('livewire.fornews-index', [
            'posts' => $posts
        ]);
    }
}