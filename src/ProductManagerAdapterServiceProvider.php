<?php

namespace Ikoncept\ProductManagerAdapter;

use Ikoncept\ProductManagerAdapter\Commands\ProductManagerAdapterCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ProductManagerAdapterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('product-manager-adapter')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_product-manager-adapter_table')
            ->hasCommand(ProductManagerAdapterCommand::class);
    }
}
