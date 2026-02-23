<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Division extends Model
{
    protected $guarded = [];

    public function members() {
        return $this->hasMany(Member::class)->orderBy('sort_order');
    }

    protected static function booted() {
        static::saved(fn () => Cache::forget('struktur-organisasi'));
        static::deleted(fn () => Cache::forget('struktur-organisasi'));
    }
}
