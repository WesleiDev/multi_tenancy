<?php
/**
 * Created by PhpStorm.
 * User: weslei
 * Date: 12/10/2017
 * Time: 11:48
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if(\Auth::user()){
            $accountId = \Auth::user()->account_id;
            $builder->where('account_id', $accountId);
            //dd($accountId);
        }



    }
}