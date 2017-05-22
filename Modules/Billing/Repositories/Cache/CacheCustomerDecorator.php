<?php

namespace Modules\Billing\Repositories\Cache;

use Modules\Billing\Repositories\CustomerRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCustomerDecorator extends BaseCacheDecorator implements CustomerRepository
{
    public function __construct(CustomerRepository $customer)
    {
        parent::__construct();
        $this->entityName = 'billing.customers';
        $this->repository = $customer;
    }
}
