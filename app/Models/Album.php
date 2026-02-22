<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    protected static function booted()
    {
        // Hancurkan cache saat album di-update atau disimpan
        static::saved(function ($album) {
            Cache::forget("album.{$album->slug}");
            Cache::forget('albums.index');
        });

        // Hancurkan cache dan hapus file cover fisik saat album dihapus
        static::deleted(function ($album) {
            Cache::forget("album.{$album->slug}");
            Cache::forget('albums.index');
            
            if ($album->cover_image && Storage::disk('public')->exists($album->cover_image)) {
                Storage::disk('public')->delete($album->cover_image);
            }
        });
    }
}
