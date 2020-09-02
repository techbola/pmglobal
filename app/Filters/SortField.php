<?php


namespace App\Filters;


class SortField
{
    public function handle($request, \Closure $next)
    {
        if (!request()->has('sort_field') || !request()->has('sort_order_mode')){
            return $next($request);
        }

        $builder = $next($request);

        return $builder->orderBy(request('sort_field'), request('sort_order_mode'));
    }
}