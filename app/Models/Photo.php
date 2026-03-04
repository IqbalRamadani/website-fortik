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

    public function getImageUrlAttribute()
    {
        // Cek apakah kolom image_path ada dan file-nya eksis secara fisik di disk 'public'
        if ($this->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->image_path)) {
            return asset('storage/' . $this->image_path);
        }

        // Jika file hilang (Error 404/403), kembalikan gambar placeholder agar UI tetap rapi
        return asset('images/default-image.webp');
    }
}
