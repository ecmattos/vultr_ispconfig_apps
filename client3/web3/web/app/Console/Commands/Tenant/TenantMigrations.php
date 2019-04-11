<?php

namespace App\Console\Commands\Tenant;

use App\Entities\Client;
use App\Tenant\ManagerTenant;
use Artisan;
use Illuminate\Console\Command;

class TenantMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrations {--refresh}';

    private $tenant;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Migrations Tenants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManagerTenant $tenant)
    {
        parent::__construct();

        $this->tenant = $tenant;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $clients = Client::all();
        #dd($clients);

        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate';
        #$command = 'migrate';

        foreach ($clients as $client) 
        {
            #dd($client);
            
            $this->tenant->setConnection($client);

            $this->info("Connecting Client {$client->name}");

            Artisan::call($command, [
                '--force' => true,
                '--path' =>  '/database/migrations/tenant',
            ]);

            $this->info("End Connecting Client {$client->name}");
            $this->info('-----------------------------------------------------------------');
        }
    }
}

