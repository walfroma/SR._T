<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Producto';

    /**
     * Run the migrations.
     * @table Producto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idProducto');
            $table->integer('Negocio_idNegocio')->unsigned();
            $table->string('Categoria', 45)->nullable();
            $table->integer('Modelo_idModelo')->unsigned();
            $table->integer('Tipo_Reparacion_idTipo_Reparacion')->nullable()->unsigned();
            $table->string('Descripcion')->nullable();
            $table->integer('Cantidad')->nullable();
            $table->float('Precio')->nullable();

            $table->index(["Negocio_idNegocio"], 'fk_Producto_Negocio1_idx');

            $table->index(["Tipo_Reparacion_idTipo_Reparacion"], 'fk_Producto_Tipo_Reparacion1_idx');

            $table->index(["Modelo_idModelo"], 'fk_Producto_Tel_Modelo1_idx');


            $table->foreign('Modelo_idModelo', 'fk_Producto_Tel_Modelo1_idx')
                ->references('idModelo')->on('Modelo')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Negocio_idNegocio', 'fk_Producto_Negocio1_idx')
                ->references('idNegocio')->on('Negocio')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Tipo_Reparacion_idTipo_Reparacion', 'fk_Producto_Tipo_Reparacion1_idx')
                ->references('idTipo_Reparacion')->on('Tipo_Reparacion')
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
