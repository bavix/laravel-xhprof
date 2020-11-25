<?php

return [
    'enabled' => true,
    'global_middleware' => true,
    'output_dir' => null,
    'name' => 'xhprof',
    'freq' => 1 / 1000,
    'extension_name' => 'xhprof',
    'provider' => \Bavix\XHProf\Providers\XHProfProvider::class,
    'run_id' => uniqid(),
];
