<?php

use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        //-------------------------Permisos de Usuarios--------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar usuarios',
            'slug'       =>'users.index',
            'description'=>'Lista y Navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de usuario',
            'slug'       =>'users.show',
            'description'=>'Ven en detalle cada usuario del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de usuarios',
            'slug'       =>'users.create',
            'description'=>'Crear cualquier dato de un usuarios del sistema',
        ]);


        Permission::create([
            'name'       =>'Edicion de usuarios',
            'slug'       =>'users.edit',
            'description'=>'Editar cualquier dato de un usuarios del sistema',
        ]);


        Permission::create([
            'name'       =>'Eliminar usuario',
            'slug'       =>'users.destroy',
            'description'=>'Eliminar cualquier usuario del sistema',
        ]);

        //--------------------------------Roles-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar roles',
            'slug'       =>'roles.index',
            'description'=>'Lista y Navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de rol',
            'slug'       =>'roles.show',
            'description'=>'Ven en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de roles',
            'slug'       =>'roles.create',
            'description'=>'Crear cualquier dato de un roles del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de roles',
            'slug'       =>'roles.edit',
            'description'=>'Editar cualquier dato de un roles del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar rol',
            'slug'       =>'roles.destroy',
            'description'=>'Eliminar cualquier rol del sistema',
        ]);

        //--------------------------------Permisos-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Permisos',
            'slug'       =>'permissions.index',
            'description'=>'Lista y Navega todos los Permisos del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Permiso',
            'slug'       =>'permissions.show',
            'description'=>'Ven en detalle cada Permiso del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Permisos',
            'slug'       =>'permissions.create',
            'description'=>'Crear cualquier dato de un Permisos del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Permisos',
            'slug'       =>'permissions.edit',
            'description'=>'Editar cualquier dato de un Permisos del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Permiso',
            'slug'       =>'permissions.destroy',
            'description'=>'Eliminar cualquier Permiso del sistema',
        ]);



        //-----------------creacion de roles-------------------------------------------------

        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('Navegar usuarios');
        $role->givePermissionTo('Ver detalle de usuario');
        $role->givePermissionTo('Edicion de usuarios');

        $role = Role::create(['name' => 'moderador']);
        $role->givePermissionTo('Navegar usuarios');
        $role->givePermissionTo('Ver detalle de usuario');





        $role = Role::create(['name' => 'master']);
        $role->givePermissionTo(Permission::all());


    }
}
