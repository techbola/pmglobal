<?php


namespace App\Filters;


class FilterField
{
    public function handle($request, \Closure $next)
    {
        if (!request()->has('filter_field') || !request()->has('filter_value')){
            return $next($request);
        }

        $builder = $next($request);

        return $builder->where(request('filter_field'), request('filter_value'));
    }
}