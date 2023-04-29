<?php

namespace FireAZ\Clients\Repositories\Caches;

use FireAZ\Clients\Repositories\Interfaces\AppClientInterface;
use FireAZ\Platform\Support\Repositories\Caches\CacheAbstractDecorator;

class AppClientCacheDecorator  extends CacheAbstractDecorator implements AppClientInterface
{
}
