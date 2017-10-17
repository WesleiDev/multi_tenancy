<?php
/**
 * Created by PhpStorm.
 * User: José Eduardo
 * Date: 13/10/2017
 * Time: 11:24
 */

namespace App\Tenant;


class TenantManager
{
    private $tenant; //Instancia de account

    public function routeParam(){
        return \Request::route(config('tenant.route_param'));
    }

    public function isSubdomainExecpet(){
        $tenantParam = $this->routeParam();
        return $tenantParam && in_array($tenantParam, config('tenant.subdomains_except')) ? true : false;
    }

    public function getTenant(){
        if(!$this->tenant){
            $model = config('tenant.model');
            $this->tenant = $model::where(config('tenant.field_name'), $this->routeParam())->first();
        }

        return $this->tenant;
    }
}