<?php

use Illuminate\Routing\Router;
/** @var Router $router */

/** @var Router $router */
$router->group(['prefix' => 'store'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->get('index', ['as' => 'store.index', 'uses' => 'StoreController@index']);
    $router->post('pay', ['as' => 'store.pay', 'uses' => 'StoreController@postPayWithStripe']);
});


$router->group(['prefix' => 'newsletter'], function (Router $router) {
    $locale = LaravelLocalization::setLocale() ?: App::getLocale();
    $router->post('confirmation/send', ['as' => 'newsletter.send.confirmation', 'uses' => 'NewsletterController@sendConfirmation']);
    $router->get('subscribe/{token}', ['as' => 'newsletter.subscribe', 'uses' => 'NewsletterController@subscribe']);
    $router->get('unsubscribe', ['as' => 'newsletter.unsubscribe', 'uses' => 'NewsletterController@unsubscribe' ]);
    $router->post('post/unsubscribe', ['as' => 'newsletter.post.unsubscribe', 'uses' => 'NewsletterController@postUnsubscribe']);

});

