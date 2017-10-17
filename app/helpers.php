<?php


use App\Tenant\TenantManager;

if(!function_exists('routeTenant')){


    function routeTenant($name, $params = [], $absolute = true){
        /** @var TenantManager $tenantManager*/
        $tenantManager = app(TenantManager::class);
        $tenantParam = $tenantManager->routeParam();
        return route($name, $params+[config('tenant.route_param')=>$tenantParam], $absolute);


    }
}

if(!function_exists('layoutTenant')){
    function layoutTenant(){
        /** @var TenantManager $tenantManager*/
        $tenantManager = app(TenantManager::class);
        $isSubdomainExcept = $tenantManager->isSubdomainExecpet();
        return !$isSubdomainExcept?'layouts.app':'layouts.admin';

    }
}
