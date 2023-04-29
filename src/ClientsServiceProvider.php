<?php

namespace FireAZ\Clients;

use FireAZ\Clients\Models\AppClient;
use FireAZ\Clients\Repositories\Caches\AppClientCacheDecorator;
use FireAZ\Clients\Repositories\Eloquent\AppClientRepositories;
use FireAZ\Clients\Repositories\Interfaces\AppClientInterface;
use Illuminate\Support\ServiceProvider;
use FireAZ\LaravelPackage\ServicePackage;
use FireAZ\Platform\Traits\WithServiceProvider;
use Illuminate\Routing\Router;

class ClientsServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('clients')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations()
            ->RouteWeb()
            ->runsSeeds();
    }
    public function packageRegistered()
    {
        $this->app->bind(AppClientInterface::class, function () {
            return new AppClientCacheDecorator(new AppClientRepositories(new AppClient()));
        });
    }
    public function packageBooted()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->matched(function () use ($router) {
            if (in_array('api', $router->current()->middleware())) {
                $router->pushMiddlewareToGroup('api', \FireAZ\Clients\Http\Middleware\AppClientMiddleware::class);
            }
        });
    }
}
