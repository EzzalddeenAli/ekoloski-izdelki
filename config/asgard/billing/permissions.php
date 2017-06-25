<?php

return [
    'billing.subscriptions' => [
        'index' => 'billing::subscriptions.list resource',
        'create' => 'billing::subscriptions.create resource',
        'edit' => 'billing::subscriptions.edit resource',
        'destroy' => 'billing::subscriptions.destroy resource',
    ],
    'billing.customers' => [
        'index' => 'billing::customers.list resource',
        'create' => 'billing::customers.create resource',
        'edit' => 'billing::customers.edit resource',
        'destroy' => 'billing::customers.destroy resource',
    ],
    'billing.orders' => [
        'index' => 'billing::orders.list resource',
        'create' => 'billing::orders.create resource',
        'edit' => 'billing::orders.edit resource',
        'destroy' => 'billing::orders.destroy resource',
    ],
// append



];
