<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bulletin extends Model
{
    /** @use HasFactory<\Database\Factories\BulletinFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'published_at',
        'content',
        'image',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
