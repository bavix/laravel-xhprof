<?php

namespace Bavix\XHProf;

use Bavix\XHProf\Middleware\XHProfMiddleware;
use Bavix\XHProf\Services\XHProfService;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class XHProfServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/config.php',
            'xhprof'
        );

        $this->app->singleton(XHProfMiddleware::class);
        $this->app->singleton(XHProfService::class);

        if (config('xhprof.global_middleware', false)) {
            $this->extraMiddleware(XHProfMiddleware::class);
        }
    }

    /**
     * @param string $className
     */
    public function extraMiddleware(string $className): void
    {
        /**
         * @var \Illuminate\Foundation\Http\Kernel $kernel
         */
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($className);
    }

}
