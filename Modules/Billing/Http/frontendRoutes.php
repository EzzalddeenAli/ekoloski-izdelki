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



// $router->any('deploy', ['middleware' => 'github.secret.token', 'as' => 'billing.deploy', 'uses' => 'DeployController@deploy']);

Route::any('/github/webhook', function(){


    try{
        $xEvent = Request::header('X-GitHub-Event');
        $payload = json_decode(Request::getContent());
    }
    catch(Exception $e){

        Log::info('Error Handling Webhook content');
        return;
    }

    # Check if it's a push event, just in case we register for all events.
    if($xEvent !='push'){
        Log::info('Ignoring X-GitHub-Event' .$xEvent );
        return Response::json(['message'=>'ignored non push event'], 200);
    }

    # Check if it's a push to the master branch.
    if($payload->ref !='refs/heads/master'){
        Log::info('Ignoring push on branch' .$payload->ref);
        return Response::json(['message'=>'ignored push to branch :' .$payload->ref ], 200);

    }
    # Firte our webhook event handler.
    //  $event = Event::fire('github.webhook', [$payload]);
    return Response::json(['message'=>'processing push event deploying updates, thanks'], 200);


});

