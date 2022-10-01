<?php

namespace App;

class Container
{
    protected array $bindings = [];

    public function bind(mixed $key, mixed $value): void
    {
        $this->bindings[$key] = $value;
    }

    public function make(mixed $key): mixed
    {
        if (!isset($this->bindings[$key]) || !is_callable($this->bindings[$key])) {
            return $this->bindings[$key];
        }

        return call_user_func($this->bindings[$key]);
    }
}


