<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permissions']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'create rep-estrategico']);
        Permission::create(['name' => 'read rep-estrategico']);
        Permission::create(['name' => 'update rep-estrategico']);
        Permission::create(['name' => 'delete rep-estrategico']);

        Permission::create(['name' => 'create rep-tactico']);
        Permission::create(['name' => 'read rep-tactico']);
        Permission::create(['name' => 'update rep-tactico']);
        Permission::create(['name' => 'delete rep-tactico']);

        Permission::create(['name' => 'read bitacora']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'administrador']);
        $role->givePermissionTo('create user');
        $role->givePermissionTo('read users');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');
        $role->givePermissionTo('read bitacora');

        $role = Role::create(['name' => 'gerente']);
        $role->givePermissionTo('create rep-estrategico');
        $role->givePermissionTo('read rep-estrategico');
        $role->givePermissionTo('update rep-estrategico');
        $role->givePermissionTo('delete rep-estrategico');
        $role->givePermissionTo('create rep-tactico');
        $role->givePermissionTo('read rep-tactico');
        $role->givePermissionTo('update rep-tactico');
        $role->givePermissionTo('delete rep-tactico');

        $role = Role::create(['name' => 'subgerente']);
        $role->givePermissionTo('create rep-tactico');
        $role->givePermissionTo('read rep-tactico');
        $role->givePermissionTo('update rep-tactico');
        $role->givePermissionTo('delete rep-tactico');

        $role = Role::create(['name'=> 'asesor de ventas']);
    }
}
