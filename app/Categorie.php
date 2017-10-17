<?php

namespace App;

use App\Scopes\TenantModels;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model

{
    use TenantModels;

    protected $fillable =[
        'name'
    ];



//    protected static function boot(){
//        parent::boot();
//        static::addGlobalScope(new TenantScope());
//    }

//    public function scopeByAccount(Builder $query, $accountId ){
//        return $query->where('account_id', $accountId);
//    }
}
