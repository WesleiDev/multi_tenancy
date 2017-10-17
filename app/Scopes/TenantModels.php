<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait TenantModels{
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new \App\Scopes\TenantScope());

        static::creating(function(Model $model){
            if(auth()->user()){
                /** @var TenantManager $tenantManager */
                $tenantManager = app(TenantManager::class);
                if($tenantManager->getTenant()){
                    $accountId = $tenantManager->getTenant()->id;
                    $model->account_id = $accountId;
                }

            }

        });
    }

}