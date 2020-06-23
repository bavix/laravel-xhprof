<?php

namespace Bavix\XHProf\Providers;

use XHProfRuns_Default;

class TidewaysProvider implements ProviderInterface
{

    /**
     * @inheritDoc
     */
    public function enable()
    {
        $path = config('xhprof.path');
        include_once $path . '/xhprof_lib/utils/xhprof_lib.php';
        include_once $path . '/xhprof_lib/utils/xhprof_runs.php';
        tideways_xhprof_enable(config('xhprof.flags', 0));
    }

    /**
     * @inheritDoc
     */
    public function disable()
    {
        $data = tideways_xhprof_disable();
        $runs = new XHProfRuns_Default(config('xhprof.output_dir', null));
        $runs->save_run($data, config('xhprof.name'));
    }

}
