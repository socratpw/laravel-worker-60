<?php

namespace App\Http\Filters\Var1;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    private array $params = [];


    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function applyFilter(Builder $builder)
    {
        foreach ($this->getCallbacks() as $key => $callback) {
            if (isset($this->params[$key])) {
                $this->$callback($builder, $this->params[$key]);
            }
        }
    }

    abstract function getCallbacks(): array;






}
