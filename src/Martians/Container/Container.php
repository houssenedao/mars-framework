<?php

namespace Martians\Container;

use ArrayAccess;

class Container implements ArrayAccess
{

    protected $items = [];


    protected $cache = [];


    public function __construct(array $items = [])
    {
        foreach ($items as $key => $item) {
            $this->offsetSet($key, $item);
        }
    }


    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }


    public function offsetGet($offset)
    {
        if (!$this->has($offset))
            return null;

        if (isset($this->cache[$offset]))
            return $this->cache[$offset];

        return $this->cache[$offset] = $this->items[$offset]($this);
    }


    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }


    public function offsetUnset($offset)
    {
        //
    }


    public function has($offset)
    {
        return $this->offsetExists($offset);
    }


    public function __get($property)
    {
        return $this->offsetGet($property);
    }
}