<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(DB::getSchemaBuilder()->hasTable('permissions')){

            $permissions = Permission::with('roles')->get();

            foreach ($permissions as $permission) {

                Gate::define($permission->name, function(User $user) use ($permission){
                    return $user->hasPermission($permission);
                });
            }

            Gate::before(function(User $user, $ability){
                if($user->hasAnyRoles('admin'))
                    return true;
            });
        }
    }
}
