<?php

namespace App\Restify;

use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository as RestifyRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

abstract class Repository extends RestifyRepository
{

     /**
      * Build a "show" and "index" query for the given repository.
      *
      * @param  RestifyRequest  $request
      * @param  \Illuminate\Database\Eloquent\Builder  $query
      * @return \Illuminate\Database\Eloquent\Builder
      */
     public static function mainQuery(RestifyRequest $request, Builder|Relation $query)
     {
         return $query;
     }

    /**
     * Build an "index" query for the given repository.
     *
     * @param  RestifyRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(RestifyRequest $request, Builder|Relation $query)
    {
        return $query;
    }

    /**
     * Build a "show" query for the given repository.
     *
     * @param  RestifyRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function showQuery(RestifyRequest $request, Builder|Relation $query)
    {
        return $query;
    }


    public function serializeForIndex(RestifyRequest $request): array
    {
        $data = parent::serializeForIndex($request);
        // $attributes = $this->when((bool) $attrs = $this->resolveIndexAttributes($request), $attrs);
        /**
        * move attributes to one level up  and extract them , unset original attributes
        */
        $data = array_merge($data,$data['attributes']);
        unset($data['attributes']);
    
          return $data;
    }

}
