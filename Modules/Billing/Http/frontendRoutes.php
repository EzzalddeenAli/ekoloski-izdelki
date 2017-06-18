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

    $router->any('unsubscribe/{token?}', ['as' => 'newsletter.unsubscribe', 'uses' => 'NewsletterController@unsubscribe' ]);


    // $router->post('post/unsubscribe', ['as' => 'newsletter.post.unsubscribe', 'uses' => 'NewsletterController@postUnsubscribe']);
    // $router->get('unsubscribe/success', ['as' => 'newsletter.unsubscribe.success', 'uses' => 'NewsletterController@']) // not available
});

$router->get('legal', ['as' => 'billing.legal.general', 'uses' => 'LegalController@general']);


// is defined in asgard core.conf
// $router->group(['middleware' => 'log.event', 'uses' => 'LogController@event']);

// route to set frontend_token
$router->any('log/set/frontend/{token}', ['as' => 'log.set.frontend.token', 'uses' => 'LogController@setFrontendToken']);

// test SMS
$router->get('sms/test', ['as' => 'billing.sms.test', 'uses' => 'SMSController@test']);
$router->post('sms/send', ['as' => 'billing.sms.send', 'uses' => 'SMSController@send']);


// TODO: make deployment module
// 'middleware' => 'github.secret.token',
$router->any('deploy', ['as' => 'billing.deploy', 'uses' => 'DeployController@deploy']);
