<?php

namespace Vhnh\Search\Contracts;

interface Searchable
{
    public static function search(string $term, $attributes) : iterable;
}
