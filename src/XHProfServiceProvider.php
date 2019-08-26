<?php

namespace Bavix\XHProf;

use Bavix\XHProf\Middleware\XHProfMiddleware;
use Bavix\XHProf\Services\XHProfService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class XHProfServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/config.php',
            'xhprof'
        );

        $this->app->singleton(XHProfService::class);

        /**
         * @var \Illuminate\Foundation\Http\Kernel $kernel
         */
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware(XHProfMiddleware::class);
    }

}
