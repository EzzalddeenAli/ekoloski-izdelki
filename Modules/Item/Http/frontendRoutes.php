<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'item'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('index', ['as' => 'item.index', 'uses' => 'ItemController@index']);
    $router->get('show/{slug}', ['as' => 'item.show', 'uses' => 'PublicController@show']);
    $router->get('near', ['as' => 'item.show', 'uses' => 'PublicController@near']);

});

