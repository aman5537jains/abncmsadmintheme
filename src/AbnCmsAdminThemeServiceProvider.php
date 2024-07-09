<?php

namespace Aman5537jains\AbnCmsAdminTheme;


use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class AbnCmsAdminThemeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'AbnCmsAdminTheme');

    }



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
