<?php

namespace Bavix\XHProf\Providers;

interface ProviderInterface
{
    /**
     * @return void
     */
    public function enable();

    /**
     * @return void
     */
    public function disable();
}
