<?php

namespace Modules\Item\Repositories\Cache;

use Modules\Item\Repositories\OpeningTimeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheOpeningTimeDecorator extends BaseCacheDecorator implements OpeningTimeRepository
{
    public function __construct(OpeningTimeRepository $openingtime)
    {
        parent::__construct();
        $this->entityName = 'item.openingtimes';
        $this->repository = $openingtime;
    }
}
