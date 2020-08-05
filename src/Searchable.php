<?php

namespace Vhnh\Search;

trait Searchable
{
    public static function search(string $term, $attributes) : iterable
    {
        $attributes = is_array($attributes) ? $attributes : [$attributes];

        return static::whereLike($term, $attributes)->get()->map->toSearchResult();
    }

    public function toSearchResult()
    {
        return new Result($this);
    }
}
