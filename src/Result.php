<?php

namespace Vhnh\Search;

class Result
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function item()
    {
        return $this->item;
    }

    public function originalType()
    {
        return $this->item->getMorphClass();
    }

    public function __get($key)
    {
        return $this->item->$key;
    }

    public function __call($method, $parameters)
    {
        return $this->item->$method(...$parameters);
    }
}
