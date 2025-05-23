<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $role = Role::create([
            'name' => 'Admin',
            'code' => 'admin',
        ]);

        //permission list as array
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'profile-index',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            'cmspage-list',
            'cmspage-create',
            'cmspage-edit',
            'cmspage-delete',

            // 'currency-list',
            // 'currency-create',
            // 'currency-edit',
            // 'currency-delete',

            'tag-list',
            'tag-create',
            'tag-edit',
            'tag-delete',

            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',

            'catalog-list',
            'catalog-create',
            'catalog-edit',
            'catalog-delete',

            'showcase-list',
            'showcase-create',
            'showcase-edit',
            'showcase-delete',

            // 'file-manager',
            'websetting-edit',
            'user-activity',
            // 'log-view',
        ];

        //create and assign permission 
        for($i=0; $i<count($permissions); $i++)
        {
            $permission = Permission::create(['name' => $permissions[$i]]);

            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        }
       
    }
}
