<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Fornews extends Component
{
    public function render()
    {
        
        $posts = Post::published()
            ->with('author') // Eager load relasi author untuk mencegah N+1
            ->where('published_at', '<=', now())
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
