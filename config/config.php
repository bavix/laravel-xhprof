<?php

return [
    'enabled' => true,
    'global_middleware' => true,
    'path' => '/opt/xhprof',
    'output_dir' => null,
    'name' => 'xhprof',
    'freq' => 1 / 1000,
    'extension_name' => 'xhprof',
    'provider' => \Bavix\XHProf\Providers\XHProfProvider::class,
];
