<?php

namespace Native\Laravel;

use Native\Laravel\Client\Client;
use Native\Laravel\DataObjects\Process;

class ProcessManager
{
    public function __construct(protected Client $client) {}

    public function spawn(Process $process): int
    {
        return $this->client->post('process-manager/spawn', [
            'command' => $process->command,
            'args' => $process->arguments,
            'options' => (object) $process->options,
            'interval' => $process->interval,
            'delay' => $process->delay,
        ])
            ->json('pid');
    }

    public function kill(int $pid): void
    {
        $this->client->post('process-manager/kill', [
            'pid' => $pid,
        ]);
    }

    public function findFreePort(): int
    {
        $sock = socket_create_listen(0);
        socket_getsockname($sock, $addr, $port);
        socket_close($sock);

        return $port;
    }
}
