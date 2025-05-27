<?php

namespace App\Models\Traits;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, $filter): Builder
    {
        foreach (get_object_vars($filter) as $field => $value) {
            if (is_null($value)) continue;

            $method = 'filterBy' . ucfirst($field);

            if (method_exists($this, $method)) {
                $this->{$method}($builder, $value);
            } else {
                $builder->where($field, $value instanceof UserType ? $value->value : $value);
            }
        }

        return $builder;
    }
}
