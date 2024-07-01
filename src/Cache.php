<?php

namespace Native\Laravel;

use Native\Laravel\Client\Client;

class Cache
{
    public function __construct(protected Client $client) {}

    public function set($key, $value): void
    {
        $this->client->post('cache/'.$key, [
            'value' => $value,
        ]);
    }

    public function getAll(): mixed
    {
        return $this->client->get('cache')
            ->json();
    }

    public function get($key, $default = null): mixed
    {
        return $this->client->get('cache/'.$key)
            ->json('value') ?? $default;
    }
}
