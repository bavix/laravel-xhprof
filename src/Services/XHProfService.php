<?php

namespace Bavix\XHProf\Services;

use Bavix\XHProf\Providers\ProviderInterface;
use Bavix\XHProf\Providers\XHProfProvider;
use Bavix\XHProf\Providers\EmptyProvider;


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
        if (extension_loaded('xhprof')) {
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
