<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Faq extends Model
{
    protected $guarded = [];

    protected static function booted() {
        static::saved(fn () => Cache::forget('faqs_data'));
        static::deleted(fn () => Cache::forget('faqs_data'));
    }
}
