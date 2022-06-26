<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Util\TenantConnector;
use App\Models\Tenant;

class SeedTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed-tenant {--tenant=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute seeders for all tenants';

    public function __construct()
    {
        parent::__construct();
    }  
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tenants = $this->getTenants();
        foreach ($tenants as $tenant) {
            $this->comment("\n" . $tenant->name);
            try {
                TenantConnector::connect($tenant);
                $this->call($this->getSeedCommand(), ['--database' => 'tenant']);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }
    /**
     * @return Tenant[]
     */
    private function getTenants() {
        $query = Tenant::query();
        if ($this->option('tenant')) {
            $query->where('id', $this->option('tenant'));
        }
        return $query->get();
    }
    /**
     * @return string
     */
    private function getSeedCommand() {   
        $command = 'db:seed';
        
        return $command;
    }
}
