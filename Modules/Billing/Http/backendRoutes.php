<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/billing'], function (Router $router) {
    $router->bind('subscription', function ($id) {
        return app('Modules\Billing\Repositories\SubscriptionRepository')->find($id);
    });
    $router->get('subscriptions', [
        'as' => 'admin.billing.subscription.index',
        'uses' => 'SubscriptionController@index',
        'middleware' => 'can:billing.subscriptions.index'
    ]);
    $router->get('subscriptions/create', [
        'as' => 'admin.billing.subscription.create',
        'uses' => 'SubscriptionController@create',
        'middleware' => 'can:billing.subscriptions.create'
    ]);
    $router->post('subscriptions', [
        'as' => 'admin.billing.subscription.store',
        'uses' => 'SubscriptionController@store',
        'middleware' => 'can:billing.subscriptions.create'
    ]);
    $router->get('subscriptions/{subscription}/edit', [
        'as' => 'admin.billing.subscription.edit',
        'uses' => 'SubscriptionController@edit',
        'middleware' => 'can:billing.subscriptions.edit'
    ]);
    $router->put('subscriptions/{subscription}', [
        'as' => 'admin.billing.subscription.update',
        'uses' => 'SubscriptionController@update',
        'middleware' => 'can:billing.subscriptions.edit'
    ]);
    $router->delete('subscriptions/{subscription}', [
        'as' => 'admin.billing.subscription.destroy',
        'uses' => 'SubscriptionController@destroy',
        'middleware' => 'can:billing.subscriptions.destroy'
    ]);
    $router->bind('customer', function ($id) {
        return app('Modules\Billing\Repositories\CustomerRepository')->find($id);
    });
    $router->get('customers', [
        'as' => 'admin.billing.customer.index',
        'uses' => 'CustomerController@index',
        'middleware' => 'can:billing.customers.index'
    ]);
    $router->get('customers/create', [
        'as' => 'admin.billing.customer.create',
        'uses' => 'CustomerController@create',
        'middleware' => 'can:billing.customers.create'
    ]);
    $router->post('customers', [
        'as' => 'admin.billing.customer.store',
        'uses' => 'CustomerController@store',
        'middleware' => 'can:billing.customers.create'
    ]);
    $router->get('customers/{customer}/edit', [
        'as' => 'admin.billing.customer.edit',
        'uses' => 'CustomerController@edit',
        'middleware' => 'can:billing.customers.edit'
    ]);
    $router->put('customers/{customer}', [
        'as' => 'admin.billing.customer.update',
        'uses' => 'CustomerController@update',
        'middleware' => 'can:billing.customers.edit'
    ]);
    $router->delete('customers/{customer}', [
        'as' => 'admin.billing.customer.destroy',
        'uses' => 'CustomerController@destroy',
        'middleware' => 'can:billing.customers.destroy'
    ]);
    $router->bind('order', function ($id) {
        return app('Modules\Billing\Repositories\OrderRepository')->find($id);
    });
    $router->get('orders', [
        'as' => 'admin.billing.order.index',
        'uses' => 'OrderController@index',
        'middleware' => 'can:billing.orders.index'
    ]);
    $router->get('orders/create', [
        'as' => 'admin.billing.order.create',
        'uses' => 'OrderController@create',
        'middleware' => 'can:billing.orders.create'
    ]);
    $router->post('orders', [
        'as' => 'admin.billing.order.store',
        'uses' => 'OrderController@store',
        'middleware' => 'can:billing.orders.create'
    ]);
    $router->get('orders/{order}/edit', [
        'as' => 'admin.billing.order.edit',
        'uses' => 'OrderController@edit',
        'middleware' => 'can:billing.orders.edit'
    ]);
    $router->put('orders/{order}', [
        'as' => 'admin.billing.order.update',
        'uses' => 'OrderController@update',
        'middleware' => 'can:billing.orders.edit'
    ]);
    $router->delete('orders/{order}', [
        'as' => 'admin.billing.order.destroy',
        'uses' => 'OrderController@destroy',
        'middleware' => 'can:billing.orders.destroy'
    ]);
// append



});
