<?php
/**
 * Created by PhpStorm.
 * User: José Eduardo
 * Date: 17/10/2017
 * Time: 17:12
 */

namespace App\Routing;

use App\Tenant\TenantManager;
use Illuminate\Routing\Redirector as RedirectorLaravel;

class Redirector extends RedirectorLaravel
{
    public function routeTenant($name, $params = [], $status = 302, $headers = []){

        /** @var TenantManager $tenantManager */
        $tenantManager = app(TenantManager::class);
        $tenantParam = $tenantManager->routeParam();

        return $this->route($name, $params+[config('tenant.route_param')=> $tenantParam], $status, $headers);
    }

}