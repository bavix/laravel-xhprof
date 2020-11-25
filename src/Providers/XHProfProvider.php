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
        xhprof_enable(config('xhprof.flags', 0));
    }

    /**
     * @inheritDoc
     */
    public function disable()
    {
        $data = xhprof_disable();

        $run_id = config('xhprof.run_id', null) ?? uniqid();

        file_put_contents(
                config('xhprof.output_dir', '/tmp') . '/' . $run_id . '.' . config('xhprof.name') . '.xhprof',
                serialize($data)
                );
    }

}
