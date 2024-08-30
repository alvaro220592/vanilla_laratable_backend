<?php

namespace Alvaro220592\LaravelVanillaDatatable;

use Illuminate\Database\Eloquent\Builder;

class DataTable {

    protected Builder $query;

    public function __construct($model) {
        // Assume que o $model seja uma instância de um modelo Eloquent ou um query builder.
        if ($model instanceof Builder) {
            $this->query = $model;
        } else {
            $this->query = $model::query();
        }
    }

    public function where(string $column, string $operator = null, $value = null): self {
        $this->query->where($column, $operator, $value);
        return $this;
    }

    public function whereIn(string $column, array $values): self {
        $this->query->whereIn($column, $values);
        return $this;
    }

    public function orderBy(string $column, string $direction = 'asc'): self {
        $this->query->orderBy($column, $direction);
        return $this;
    }

    public function getData(int $perPage = 15) {
        return $this->query->paginate($perPage);
    }

    public function get() {
        return $this->query->get();
    }
}
