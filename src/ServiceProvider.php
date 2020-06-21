<?php

namespace Vhnh\Search;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function boot()
    {
        Builder::macro('whereLike', function (string $term, array $attributes) {
            foreach ($attributes as $attribute) {
                $this->orWhere($attribute, 'LIKE', "%{$term}%");
            }
            
            return $this;
        });
    }
}
