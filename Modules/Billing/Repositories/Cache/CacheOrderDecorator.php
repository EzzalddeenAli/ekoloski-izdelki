<?php

namespace Modules\Billing\Repositories\Cache;

use Modules\Billing\Repositories\OrderRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheOrderDecorator extends BaseCacheDecorator implements OrderRepository
{
    public function __construct(OrderRepository $order)
    {
        parent::__construct();
        $this->entityName = 'billing.orders';
        $this->repository = $order;
    }
}
