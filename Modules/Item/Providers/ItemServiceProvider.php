<?php

namespace Modules\Item\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class ItemServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
        $this->publishConfig('item', 'permissions');
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
            'Modules\Item\Repositories\ItemRepository',
            function () {
                $repository = new \Modules\Item\Repositories\Eloquent\EloquentItemRepository(new \Modules\Item\Entities\Item());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Item\Repositories\Cache\CacheItemDecorator($repository);
            }
        );
// add bindings

    }
}
