<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EnvatoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/Envato/User.php';
        require_once app_path() . '/Helpers/Envato/StringCustom.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
