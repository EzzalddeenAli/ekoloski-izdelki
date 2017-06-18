<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'item'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('index', ['as' => 'item.index', 'uses' => 'ItemController@index']);        // List of all items
    $router->get('near', ['as' => 'item.show', 'uses' => 'PublicController@near']);         // Find near items
    $router->get('show/{slug}', ['as' => 'item.show', 'uses' => 'PublicController@show']);  // PDP

    //////////// ajax
    $router->get('short/{id}', ['as' => 'item.get', 'uses' => 'PublicController@short']);   // short description
    $router->any('bounds', ['as' => 'item.bounds', 'uses' => 'ApiController@bounds']);
});

