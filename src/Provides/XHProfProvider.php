<?php

namespace Bavix\XHProf\Providers;

use XHProfRuns_Default;
use function xhprof_disable;
use function xhprof_enable;

class XHProfProvider implements ProviderInterface
{

    /**
     * @inheritDoc
     */
    public function enable()
    {
        $path = config('xhprof.path');
        include_once $path . '/xhprof_lib/utils/xhprof_lib.php';
        include_once $path . '/xhprof_lib/utils/xhprof_runs.php';
        xhprof_enable(config('xhprof.flags', 0));
    }

    /**
     * @inheritDoc
     */
    public function disable()
    {
        $data = xhprof_disable();
        $runs = new XHProfRuns_Default();
        $runs->save_run($data, config('xfprof.name'));
    }

}
