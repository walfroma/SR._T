<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Detalle_Venta';

    /**
     * Run the migrations.
     * @table Detalle_Venta
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDetalle_Venta');
            $table->integer('Factura_idFactura')->unsigned();
            $table->integer('Cantidad')->nullable();
            $table->float('Precio')->nullable();
            $table->integer('Producto_idProducto')->unsigned();

            $table->index(["Producto_idProducto"], 'fk_Detalle_Venta_Producto1_idx');

            $table->index(["Factura_idFactura"], 'fk_Detalle_Venta_Factura1_idx');


            $table->foreign('Factura_idFactura', 'fk_Detalle_Venta_Factura1_idx')
                ->references('idFactura')->on('Factura')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Producto_idProducto', 'fk_Detalle_Venta_Producto1_idx')
                ->references('idProducto')->on('Producto')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
