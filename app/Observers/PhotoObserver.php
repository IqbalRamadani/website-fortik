<?php

namespace App\Observers;

use App\Models\Photo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoObserver
{
    /**
     * Handle the Photo "created" event.
     */
    public function created(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "saved" event.
     */
    public function saved(Photo $photo): void
    {
        $this->clearCache($photo);
    }

    /**
     * Handle the Photo "updated" event.
     */
    public function updated(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "deleted" event.
     */
    public function deleted(Photo $photo): void
    {
        $this->clearCache($photo);

        if($photo->image_path) {
            Storage::disk('public')->delete($photo->image_path);
        }
    }

    /**
     * Handle the Photo "restored" event.
     */
    public function restored(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "force deleted" event.
     */
    public function forceDeleted(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "clear cache" event.
     */
    public function clearCache(Photo $photo): void
    {
        if ($photo->album_id) {
            $slug = DB::table('albums')->where('id', $photo->album_id)->value('slug');
            if ($slug) {
                Cache::forget("album.{$slug}");
            }
        }
        Cache::forget('beranda.slider_photos');
    }
}
