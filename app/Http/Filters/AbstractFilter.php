<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Traits\Filterable;

abstract class AbstractFilter implements FilterInterface
{
    /** @var array */
    private $queryParams = [];

    /**
     * AbstractFilter constructor.
     *
     * @param array $queryParams
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    abstract protected function getCallbacks(): array;

    public function apply(Builder $builder)
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     */
    protected function before(Builder $builder)
    {

    }
}
