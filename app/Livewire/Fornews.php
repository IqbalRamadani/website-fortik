<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Fornews extends Component
{
    public function render()
    {
        // Ambil 4 post terbaru (4 untuk mobile, 3 untuk desktop)
        $posts = Post::with('author')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($post) {
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

        return view('livewire.fornews', [
            'posts' => $posts
        ]);
    }
}
