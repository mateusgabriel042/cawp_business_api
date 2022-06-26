<?php

namespace App\Util;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Tenant;

class TenantConnector {
    public static function connect(Tenant $tenant = null) {
        if($tenant == null){
            $tenant = Tenant::where('host', '=', request()->getHttpHost())->get();
            if($tenant->count() > 0){
                $tenant = $tenant[0];
            }else{
                return false;
            }
            
        }
        DB::purge('tenant');
        $config = Config::get('database.connections.main_cawptech_business');
        $config['host'] = $tenant->host;
        $config['port'] = $tenant->port;
        $config['database'] = $tenant->database_name;
        $config['username'] = $tenant->username;
        $config['password'] = Crypt::decrypt($tenant->password);
        Config::set("database.connections.tenant", $config);

        return true;
    }
}