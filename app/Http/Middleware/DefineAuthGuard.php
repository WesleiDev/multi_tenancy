<?php

namespace App\Http\Middleware;

use Closure;
use App\Tenant\TenantManager;
use Illuminate\Support\Facades\Config;

class DefineAuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd('Teste');
        /** @var TenantManager $tenantManager */
        $tenantManager = app(TenantManager::class);

        if(!$tenantManager->getTenant() && !$tenantManager->isSubdomainExecpet()){
            abort(404);
        }

        if(!$tenantManager->isSubdomainExecpet()){
            config([
                'auth.defaults.guard' => 'web_tenants',
                'auth.defaults.passwords' => 'user_accounts'
            ]);
        }

        //dd(config('auth.defaults'));
        //dd(\Auth::guard());
        return $next($request);
    }
}
