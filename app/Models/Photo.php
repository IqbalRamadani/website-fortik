<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];
    public function album() {
        return $this->belongsTo(Album::class);
    }

    protected static function booted()
    {
        // Hancurkan cache album induk saat foto baru ditambahkan/diubah
        static::saved(function ($photo) {
            if ($photo->album) {
                Cache::forget("album.{$photo->album->slug}");
            }
            Cache::forget('beranda.slider_photos');
        });

        // Hapus file fisik dan hancurkan cache saat foto dihapus dari Filament
        static::deleted(function ($photo) {
            if ($photo->album) {
                Cache::forget("album.{$photo->album->slug}");
            }
            Cache::forget('beranda.slider_photos');
            
            if ($photo->image_path && Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }
        });
    }
}
