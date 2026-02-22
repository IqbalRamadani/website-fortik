<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Baris ini akan membuat aplikasimu error di lokal jika ada N+1 query, 
        // tapi akan berjalan normal (mengabaikan error) saat di server IT Kampus.
        Model::preventLazyLoading(! app()->isProduction());
    }
}
