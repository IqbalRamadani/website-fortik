<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    protected $guarded = [];

    public function division() {
        return $this->belongsTo(Division::class);
    }

    protected static function booted() {
        static::saved(fn () => Cache::forget('struktur-organisasi'));
        static::deleted(function ($member) {
            Cache::forget('struktur-organisasi');
            if ($member->image && Storage::disk('public')->exists($member->image)) {
                Storage::disk('public')->delete($member->image);
            }
        });
    }

    public function getImageUrlAttribute()
{
    // Cek apakah file benar-benar ada di disk
    if ($this->image && Storage::disk('public')->exists($this->image)) {
        return asset('storage/' . $this->image);
    }

    // Jika file hilang (Error 404/403), berikan gambar default agar UI tidak hancur
    return asset('images/default-avatar.webp');
}
}
