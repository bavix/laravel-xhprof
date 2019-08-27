<?php

namespace Bavix\XHProf\Services;

use Bavix\XHProf\Providers\ProviderInterface;
use Bavix\XHProf\Providers\XHProfProvider;
use Bavix\XHProf\Providers\EmptyProvider;
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
        $freq = config('xhprof.freq', 0.1);
        if (extension_loaded('xhprof') && ($freq >= (mt_rand() / mt_getrandmax()))) {
            $this->provider = new XHProfProvider();
        } else {
            $this->provider = new EmptyProvider();
        }
    }

    /**
     * @return void
     */
    public function enable()
    {
        $this->provider->enable();
    }

    /**
     * @return void
     */
    public function disable()
    {
        $this->provider->disable();
    }

}
