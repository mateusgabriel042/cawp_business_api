<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use App\Services\RoleService;

class RoleSeeder extends Seeder {
    public function run() {
        $user1 = UserService::createUserIfNotExist('Administrador', 'admin@cawptech.com', 'c4wulp_$y5tem#');
    	
        $role1 = RoleService::createRoleIfNotExist('admin', 'admin');
        $role2 = RoleService::createRoleIfNotExist('manager', 'manager');

        $permissions = [
        	0 => ['name' => 'dashboard-view', 'slug' => 'dashboard-view'],
        	1 => ['name' => 'dashboard-create', 'slug' => 'dashboard-create'],
        	2 => ['name' => 'dashboard-update', 'slug' => 'dashboard-update'],
        	3 => ['name' => 'dashboard-delete', 'slug' => 'dashboard-delete'],

        	4 => ['name' => 'user-view', 'slug' => 'user-view'],
        	5 => ['name' => 'user-create', 'slug' => 'user-create'],
        	6 => ['name' => 'user-update', 'slug' => 'user-update'],
        	7 => ['name' => 'user-delete', 'slug' => 'user-delete'],

        	8 => ['name' => 'acl-view', 'slug' => 'acl-view'],
        	9 => ['name' => 'acl-create', 'slug' => 'acl-create'],
        	10 => ['name' => 'acl-update', 'slug' => 'acl-update'],
        	11 => ['name' => 'acl-delete', 'slug' => 'acl-delete'],

            12 => ['name' => 'customer-view', 'slug' => 'customer-view'],
            13 => ['name' => 'customer-create', 'slug' => 'customer-create'],
            14 => ['name' => 'customer-update', 'slug' => 'customer-update'],
            15 => ['name' => 'customer-delete', 'slug' => 'customer-delete'],

            16 => ['name' => 'properties-house-view', 'slug' => 'properties-house-view'],
            17 => ['name' => 'properties-house-create', 'slug' => 'properties-house-create'],
            18 => ['name' => 'properties-house-update', 'slug' => 'properties-house-update'],
            19 => ['name' => 'properties-house-delete', 'slug' => 'properties-house-delete'],

            20 => ['name' => 'properties-hotel-view', 'slug' => 'properties-hotel-view'],
            21 => ['name' => 'properties-hotel-create', 'slug' => 'properties-hotel-create'],
            22 => ['name' => 'properties-hotel-update', 'slug' => 'properties-hotel-update'],
            23 => ['name' => 'properties-hotel-delete', 'slug' => 'properties-hotel-delete'],

            24 => ['name' => 'properties-object-view', 'slug' => 'properties-object-view'],
            25 => ['name' => 'properties-object-create', 'slug' => 'properties-object-create'],
            26 => ['name' => 'properties-object-update', 'slug' => 'properties-object-update'],
            27 => ['name' => 'properties-object-delete', 'slug' => 'properties-object-delete'],

            28 => ['name' => 'properties-vehicle-view', 'slug' => 'properties-vehicle-view'],
            29 => ['name' => 'properties-vehicle-create', 'slug' => 'properties-vehicle-create'],
            30 => ['name' => 'properties-vehicle-update', 'slug' => 'properties-vehicle-update'],
            31 => ['name' => 'properties-vehicle-delete', 'slug' => 'properties-vehicle-delete'],
        ];

        foreach ($permissions as $key => $item) {
            //verificando se a permissao ja esta cadastrada
            $permission = Permission::where('name', '=', $item['name'])->first();
            if($permission == null){
                $permission = Permission::create($item);
                $role1->permissions()->attach($permission->id);//se a permissao for cadastrada sera realizado o relacionamento com o admin
            }
        }
        
        if (!UserService::relationUserRoleExist($user1['id'], $role1['id']))
            $user1->roles()->attach($role1);
    }
}
