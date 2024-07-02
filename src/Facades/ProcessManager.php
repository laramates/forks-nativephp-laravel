<?php

namespace Native\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static int spawn(\Native\Laravel\DataObjects\Process $process)
 * @method static void kill(int $pid)
 * @method static int findFreePort()
 */
class ProcessManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Native\Laravel\ProcessManager::class;
    }
}
