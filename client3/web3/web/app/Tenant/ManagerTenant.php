<?php

namespace App\Tenant;

use App\Entities\Client;
use DB;
use Schema;

class ManagerTenant
{
    public function setConnection(Client $client)
    {
        DB::purge('tenant');

        config()->set('database.connections.tenant.host', $client->hostname);
        config()->set('database.connections.tenant.databasa', $client->database);
        config()->set('database.connections.tenant.username', $client->username);
        config()->set('database.connections.tenant.password', $client->password);
        
        DB::reconnect('tenant');

        Schema::connection('tenant')->getConnection()->reconnect();
    }
}