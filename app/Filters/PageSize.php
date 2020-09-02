<?php


namespace App\Filters;


class PageSize
{
    public function handle($request, \Closure $next)
    {
        if (!request()->has('page') || !request()->has('page_size') || request('page') < 1){
            return $next($request);
        }

        $builder = $next($request);

        $res = (request('page') - 1) * request('page_size');

        return $builder->skip($res)->take(request('page_size'));
    }
}