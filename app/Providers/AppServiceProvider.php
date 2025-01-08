<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        // notifikasi
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $unreadCount = Auth::user()->unreadNotifications->count();
            } else {
                $unreadCount = 0;
            }
    
            $view->with('unreadCount', $unreadCount);
        });
    }
}
