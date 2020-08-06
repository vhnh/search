<?php

namespace Vhnh\Search\Contracts;

use Closure;

interface Searchable
{
    public static function search(string $term, $attributes, Closure $callback = null) : iterable;
}
