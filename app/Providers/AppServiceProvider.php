<?php

namespace App\Providers;

use App\Services\LanguageMenuService;
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
        // Para pasar el dato a todas las vistas ('*'), en vez de la ruta.nombre a la vista implicada
        view()->composer('partials.locale-switcher', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('languageMenu', LanguageMenuService::getMenu());
        });
    }
}
