<?php

namespace Native\Laravel\DataObjects;

class Process
{
    public function __construct(
        public string $command,
        public array $arguments = [],
        public array $options = [],
        public ?int $interval = null,
        public ?int $delay = null,
    ) {}
}
