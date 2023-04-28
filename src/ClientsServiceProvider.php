<?php

namespace FireAZ\Clients;

use Illuminate\Support\ServiceProvider;
use FireAZ\LaravelPackage\ServicePackage;
use FireAZ\Platform\Traits\WithServiceProvider;

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
}
