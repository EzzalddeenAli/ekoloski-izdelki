<?php

use Illuminate\Routing\Router;
/** @var Router $router */

/** @var Router $router */
$router->group(['prefix' => 'store'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('index', ['as' => 'store.index', 'uses' => 'StoreController@index']);
    $router->post('pay', ['as' => 'store.pay', 'uses' => 'StoreController@postPayWithStripe']);
});

