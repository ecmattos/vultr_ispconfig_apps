<?php

namespace App\Http\Middleware\Tenant;

use App\Entities\Client;
use App\Tenant\ManagerTenant;
use Closure;

class TenantMiddleware
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
        #dd('Aqui TenantMiddleware');
        #dd($request->getHost());

        $host = str_ireplace('www.', '', $request->getHost()); 

        #dd($host);

        $client = $this->getClient($host);

        if (!$client)
        {
            dd('Cliente não Localizado');
        }
        else
        {
            #dd($client);
            app(ManagerTenant::class)->setConnection($client);
        }

        return $next($request);
    }

    public function getClient($host)
    {
        return Client::where('domain', $host)->first();
    }
}
