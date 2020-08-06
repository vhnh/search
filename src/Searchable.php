<?php

namespace Vhnh\Search;

use Closure;

trait Searchable
{
    public static function search(string $term, $attributes, Closure $callback = null) : iterable
    {
        $attributes = is_array($attributes) ? $attributes : [$attributes];
        
        $callback = $callback ?: function ($query) {
            return $query->get();
        };

        return $callback(static::whereLike($term, $attributes))
            ->map->toSearchResult();
    }

    public function toSearchResult()
    {
        return new Result($this);
    }
}
