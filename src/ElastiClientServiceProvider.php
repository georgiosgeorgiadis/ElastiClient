<?php
/**
 * Created by PhpStorm.
 * User: georgios
 * Date: 10/4/2016
 * Time: 8:44 AM
 */

namespace Georgios\ElastiClient;

use Georgios\ElastiClient\Facades\ElastiClient;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

/**
 * This is the ElastiClient service provider class.
 *
 * @author Georgios Georgiadis <georgios@georgiadis.co.uk>
 */
class ElastiClientServiceProvider extends ServiceProvider {

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot() {
        $this->setupConfig();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('elasticlient.factory', function () {
            return new ElastiClientFactory();
        });

        $this->app->alias('elasticlient.factory', ElastiClientFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('elasticlient', function (Container $app) {
            $config = $app['config'];
            $factory = $app['elasticlient.factory'];

            return new ElastiClientManager($config, $factory);
        });

        $this->app->alias('elasticlient', HashidsManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->bind('elasticlient.connection', function (Container $app) {
            $manager = $app['elasticlient'];

            return $manager->connection();
        });

        $this->app->alias('elasticlient.connection', ElastiClient::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'elasticlient',
            'elasticlient.factory',
            'elasticlient.connection',
        ];
    }
}