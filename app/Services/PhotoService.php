<?php

namespace App\Services;

use App\Models\Photo;
use Illuminate\Support\Facades\Cache;

class PhotoService
{
    const SLIDER_CACHE_KEY = 'beranda.slider_photos';
    const SLIDER_CACHE_DURATION = 86400; // 24 hours in seconds

    public function getSliderPhotos()
    {
        return Cache::remember(self::SLIDER_CACHE_KEY, self::SLIDER_CACHE_DURATION, function () {
            return Photo::with('album')->latest()->take(4)->get();
        });
    }
}