<?php
namespace App\Providers;

use App\Libs\Purifier\Purifier;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class PurifierServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('purifier', function (Container $app) {
            return new Purifier($app['files'], $app['config']);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['purifier'];
    }
}
