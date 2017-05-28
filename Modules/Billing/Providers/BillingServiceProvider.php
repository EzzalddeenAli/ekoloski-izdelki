<?php

namespace Modules\Billing\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Billing\Http\Middleware\EventMiddleware;

class BillingServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @var array
     */
    protected $middleware = [
        'log.event' => EventMiddleware::class,
    ];


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        // $this->registerMiddleware($this->app['router']);
    }

    public function boot()
    {
        $this->registerMiddleware();
        $this->publishConfig('billing', 'permissions');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Billing\Repositories\SubscriptionRepository',
            function () {
                $repository = new \Modules\Billing\Repositories\Eloquent\EloquentSubscriptionRepository(new \Modules\Billing\Entities\Subscription());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Billing\Repositories\Cache\CacheSubscriptionDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Billing\Repositories\CustomerRepository',
            function () {
                $repository = new \Modules\Billing\Repositories\Eloquent\EloquentCustomerRepository(new \Modules\Billing\Entities\Customer());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Billing\Repositories\Cache\CacheCustomerDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Billing\Repositories\OrderRepository',
            function () {
                $repository = new \Modules\Billing\Repositories\Eloquent\EloquentOrderRepository(new \Modules\Billing\Entities\Order());

                if (!config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Billing\Repositories\Cache\CacheOrderDecorator($repository);
            }
        );

        // add bindings

    }

    /**
     * Register the filters.
     *
     * @internal param Router $router
     */
    private function registerMiddleware()
    {
        foreach ($this->middleware as $name => $class) {
            $this->app['router']->middleware($name, $class);
        }
    }


}
