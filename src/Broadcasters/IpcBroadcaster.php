<?php

namespace Native\Laravel\Broadcasters;

use Illuminate\Broadcasting\Broadcasters\Broadcaster;
use Native\Laravel\Client\Client;

class IpcBroadcaster extends Broadcaster
{
    public function __construct(private Client $client)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function auth($request)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function validAuthenticationResponse($request, $result)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    public function broadcast(array $channels, $event, array $payload = [])
    {
        $this->client->post('debug/ipc', [
            'channels' => $this->formatChannels($channels),
            'event' => $event,
            'payload' => $payload,
        ]);
    }
}
