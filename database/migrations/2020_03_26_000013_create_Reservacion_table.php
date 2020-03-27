<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Reservacion';

    /**
     * Run the migrations.
     * @table Reservacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idReservacion');
            $table->dateTime('Fecha_Reserva')->nullable();
            $table->dateTime('Fecha_Entrega')->nullable();
            $table->string('Estado', 30)->nullable();
            $table->integer('Cantidad')->nullable();
            $table->integer('Producto_idProducto')->nullable()->unsigned();
            $table->integer('Tipo_Reparacion_idTipo_Reparacion')->nullable()->unsigned();
            $table->string('Tipo_Reservacion', 45)->nullable();

            $table->index(["Tipo_Reparacion_idTipo_Reparacion"], 'fk_Reservacion_Tipo_Reparacion1_idx');

            $table->index(["Producto_idProducto"], 'fk_Reservacion_Producto1_idx');


            $table->foreign('Producto_idProducto', 'fk_Reservacion_Producto1_idx')
                ->references('idProducto')->on('Producto')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Tipo_Reparacion_idTipo_Reparacion', 'fk_Reservacion_Tipo_Reparacion1_idx')
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
