<?php

namespace App\Models;

use App\Observers\PhotoObserver;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];
    public function album() {
        return $this->belongsTo(Album::class);
    }

    protected static function booted()
    {
        static::observe(PhotoObserver::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return asset('images/default-image.webp');
        }

        return asset('storage/' . $this->image_path);
    }
}
