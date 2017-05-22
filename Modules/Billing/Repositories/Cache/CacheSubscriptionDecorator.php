<?php

namespace Modules\Billing\Repositories\Cache;

use Modules\Billing\Repositories\SubscriptionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSubscriptionDecorator extends BaseCacheDecorator implements SubscriptionRepository
{
    public function __construct(SubscriptionRepository $subscription)
    {
        parent::__construct();
        $this->entityName = 'billing.subscriptions';
        $this->repository = $subscription;
    }
}
