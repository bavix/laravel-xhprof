<?php

namespace Bavix\XHProf\Services;

use Bavix\XHProf\Providers\ProviderInterface;
use Bavix\XHProf\Providers\XHProfProvider;
use function extension_loaded;
use function mt_getrandmax;
use function mt_rand;

class XHProfService
{

    /**
     * @var ProviderInterface
     */
    protected $provider;

    /**
     * XHProfService constructor.
     */
    public function __construct()
    {
        if (!extension_loaded('xhprof')) {
            return;
        }

        if (!config('xhprof.enabled', false)) {
            return;
        }

        $freq = config('xhprof.freq', 0.01);
        if ($freq >= (mt_rand() / mt_getrandmax())) {
            $this->provider = new XHProfProvider();
        }
    }

    /**
     * @return void
     */
    public function enable(): void
    {
        if ($this->provider) {
            $this->provider->enable();
        }
    }

    /**
     * @return void
     */
    public function disable(): void
    {
        if ($this->provider) {
            $this->provider->disable();
        }
    }

}
