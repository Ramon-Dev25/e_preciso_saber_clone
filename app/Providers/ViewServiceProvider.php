<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Contacts;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('adm.layouts.adm', function ($view) {
            $contacts_open = Contacts::where('status', 'novo')->count();
            $view->with('contacts_open', $contacts_open);
        });

    }
}
