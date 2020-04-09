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

        //--------------------------------Bateria-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Bateria',
            'slug'       =>'Bateria.index',
            'description'=>'Lista y Navega todos las Baterias del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Bateria',
            'slug'       =>'Bateria.show',
            'description'=>'Ven en detalle cada Bateria del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Bateria',
            'slug'       =>'Bateria.create',
            'description'=>'Crear cualquier dato de una Bateria del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Bateria',
            'slug'       =>'Bateria.edit',
            'description'=>'Editar cualquier dato de una Bateria del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Bateria',
            'slug'       =>'Bateria.destroy',
            'description'=>'Eliminar cualquier Bateria del sistema',
        ]);

        //--------------------------------Lugar-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Lugar',
            'slug'       =>'Lugar.index',
            'description'=>'Lista y Navega todos los Lugar del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Lugar',
            'slug'       =>'Lugar.show',
            'description'=>'Ven en detalle cada Lugar del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Lugar',
            'slug'       =>'Lugar.create',
            'description'=>'Crear cualquier dato de un Lugar del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Lugar',
            'slug'       =>'Lugar.edit',
            'description'=>'Editar cualquier dato de un Lugar del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Lugar',
            'slug'       =>'Lugar.destroy',
            'description'=>'Eliminar cualquier Lugar del sistema',
        ]);

        //--------------------------------Marca-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Marca',
            'slug'       =>'Marca.index',
            'description'=>'Lista y Navega todos los Marca del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Marca',
            'slug'       =>'Marca.show',
            'description'=>'Ven en detalle cada Marca del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Marca',
            'slug'       =>'Marca.create',
            'description'=>'Crear cualquier dato de un Marca del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Marca',
            'slug'       =>'Marca.edit',
            'description'=>'Editar cualquier dato de un Marca del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Marca',
            'slug'       =>'Marca.destroy',
            'description'=>'Eliminar cualquier Marca del sistema',
        ]);

        //--------------------------------Negocio-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Negocio',
            'slug'       =>'Negocio.index',
            'description'=>'Lista y Navega todos los Negocio del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Negocio',
            'slug'       =>'Negocio.show',
            'description'=>'Ven en detalle cada Negocio del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Negocio',
            'slug'       =>'Negocio.create',
            'description'=>'Crear cualquier dato de un Negocio del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Negocio',
            'slug'       =>'Negocio.edit',
            'description'=>'Editar cualquier dato de un Negocio del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Negocio',
            'slug'       =>'Negocio.destroy',
            'description'=>'Eliminar cualquier Negocio del sistema',
        ]);

        //--------------------------------Pantalla-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Pantalla',
            'slug'       =>'Pantalla.index',
            'description'=>'Lista y Navega todos los Pantalla del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Pantalla',
            'slug'       =>'Pantalla.show',
            'description'=>'Ven en detalle cada Pantalla del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Pantalla',
            'slug'       =>'Pantalla.create',
            'description'=>'Crear cualquier dato de un Pantalla del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Pantalla',
            'slug'       =>'Pantalla.edit',
            'description'=>'Editar cualquier dato de un Pantalla del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Pantalla',
            'slug'       =>'Pantalla.destroy',
            'description'=>'Eliminar cualquier Pantalla del sistema',
        ]);

        //--------------------------------Tipo_Reparacion-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Tipo_Reparacion',
            'slug'       =>'Tipo_Reparacion.index',
            'description'=>'Lista y Navega todos los Tipo_Reparacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Tipo_Reparacion',
            'slug'       =>'Tipo_Reparacion.show',
            'description'=>'Ven en detalle cada Tipo_Reparacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Tipo_Reparacion',
            'slug'       =>'Tipo_Reparacion.create',
            'description'=>'Crear cualquier dato de un Tipo_Reparacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Tipo_Reparacion',
            'slug'       =>'Tipo_Reparacion.edit',
            'description'=>'Editar cualquier dato de un Tipo_Reparacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Tipo_Reparacion',
            'slug'       =>'Tipo_Reparacion.destroy',
            'description'=>'Eliminar cualquier Tipo_Reparacion del sistema',
        ]);

        //--------------------------------Modelo-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Modelo',
            'slug'       =>'Modelo.index',
            'description'=>'Lista y Navega todos los Modelo del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Modelo',
            'slug'       =>'Modelo.show',
            'description'=>'Ven en detalle cada Modelo del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Modelo',
            'slug'       =>'Modelo.create',
            'description'=>'Crear cualquier dato de un Modelo del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Modelo',
            'slug'       =>'Modelo.edit',
            'description'=>'Editar cualquier dato de un Modelo del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Modelo',
            'slug'       =>'Modelo.destroy',
            'description'=>'Eliminar cualquier Modelo del sistema',
        ]);

        //--------------------------------Detalle_Venta-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Detalle_Venta',
            'slug'       =>'Detalle_Venta.index',
            'description'=>'Lista y Navega todos los Detalle_Venta del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Detalle_Venta',
            'slug'       =>'Detalle_Venta.show',
            'description'=>'Ven en detalle cada Detalle_Venta del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Detalle_Venta',
            'slug'       =>'Detalle_Venta.create',
            'description'=>'Crear cualquier dato de un Detalle_Venta del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Detalle_Venta',
            'slug'       =>'Detalle_Venta.edit',
            'description'=>'Editar cualquier dato de un Detalle_Venta del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Detalle_Venta',
            'slug'       =>'Detalle_Venta.destroy',
            'description'=>'Eliminar cualquier Detalle_Venta del sistema',
        ]);

        //--------------------------------Especificaciones-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Especificaciones',
            'slug'       =>'Especificaciones.index',
            'description'=>'Lista y Navega todos los Especificaciones del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Especificaciones',
            'slug'       =>'Especificaciones.show',
            'description'=>'Ven en detalle cada Especificaciones del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Especificaciones',
            'slug'       =>'Especificaciones.create',
            'description'=>'Crear cualquier dato de un Especificaciones del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Especificaciones',
            'slug'       =>'Especificaciones.edit',
            'description'=>'Editar cualquier dato de un Especificaciones del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Especificaciones',
            'slug'       =>'Especificaciones.destroy',
            'description'=>'Eliminar cualquier Especificaciones del sistema',
        ]);

        //--------------------------------Factura-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Factura',
            'slug'       =>'Factura.index',
            'description'=>'Lista y Navega todos los Factura del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Factura',
            'slug'       =>'Factura.show',
            'description'=>'Ven en detalle cada Factura del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Factura',
            'slug'       =>'Factura.create',
            'description'=>'Crear cualquier dato de un Factura del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Factura',
            'slug'       =>'Factura.edit',
            'description'=>'Editar cualquier dato de un Factura del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Factura',
            'slug'       =>'Factura.destroy',
            'description'=>'Eliminar cualquier Factura del sistema',
        ]);

        //--------------------------------Producto-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Producto',
            'slug'       =>'Producto.index',
            'description'=>'Lista y Navega todos los Producto del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Producto',
            'slug'       =>'Producto.show',
            'description'=>'Ven en detalle cada Producto del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Producto',
            'slug'       =>'Producto.create',
            'description'=>'Crear cualquier dato de un Producto del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Producto',
            'slug'       =>'Producto.edit',
            'description'=>'Editar cualquier dato de un Producto del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Producto',
            'slug'       =>'Producto.destroy',
            'description'=>'Eliminar cualquier Producto del sistema',
        ]);

        //--------------------------------Reservacion-----------------------------------------------------------------------
        Permission::create([
            'name'       =>'Navegar Reservacion',
            'slug'       =>'Reservacion.index',
            'description'=>'Lista y Navega todos los Reservacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Ver detalle de Reservacion',
            'slug'       =>'Reservacion.show',
            'description'=>'Ven en detalle cada Reservacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Creacion de Reservacion',
            'slug'       =>'Reservacion.create',
            'description'=>'Crear cualquier dato de un Reservacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Edicion de Reservacion',
            'slug'       =>'Reservacion.edit',
            'description'=>'Editar cualquier dato de un Reservacion del sistema',
        ]);

        Permission::create([
            'name'       =>'Eliminar Reservacion',
            'slug'       =>'Reservacion.destroy',
            'description'=>'Eliminar cualquier Reservacion del sistema',
        ]);

//--------------------------------------------------------------------------------------------------------------------
        Permission::create([
            'name'       =>'Inicio',
            'slug'       =>'/home',
            'description'=>'Inicio del sistema',
        ]);



        //-----------------creacion de roles-------------------------------------------------

        $role = Role::create(['name' => 'cliente']);
        $role->givePermissionTo('Edicion de usuarios');
        $role->givePermissionTo('Creacion de usuarios');
        $role->givePermissionTo('Navegar Marca');
        $role->givePermissionTo('Ver detalle de Marca');
        $role->givePermissionTo('Ver detalle de Negocio');
        $role->givePermissionTo('Navegar Negocio');
        $role->givePermissionTo('Navegar Tipo_Reparacion');
        $role->givePermissionTo('Ver detalle de Tipo_Reparacion');
        $role->givePermissionTo('Navegar Modelo');
        $role->givePermissionTo('Ver detalle de Modelo');
        $role->givePermissionTo('Navegar Producto');
        $role->givePermissionTo('Ver detalle de Producto');
        $role->givePermissionTo('Navegar Reservacion');
        $role->givePermissionTo('Ver detalle de Reservacion');
        $role->givePermissionTo('Inicio');
        $role->givePermissionTo('Creacion de Reservacion');






        $role = Role::create(['name' => 'master']);
        $role->givePermissionTo(Permission::all());


    }
}
