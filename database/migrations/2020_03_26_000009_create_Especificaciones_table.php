<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecificacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Especificaciones';

    /**
     * Run the migrations.
     * @table Especificaciones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEspecificaciones');
            $table->integer('Modelo_idModelo')->unsigned();
            $table->integer('Pantalla_idPantalla')->unsigned();
            $table->integer('Bateria_idBateria')->unsigned();
            $table->integer('Procesador_idProcesador')->unsigned();

            $table->index(["Procesador_idProcesador"], 'fk_Especificaciones_Procesador1_idx');

            $table->index(["Bateria_idBateria"], 'fk_Especificaciones_Bateria1_idx');

            $table->index(["Modelo_idModelo"], 'fk_Especificaciones_Modelo1_idx');

            $table->index(["Pantalla_idPantalla"], 'fk_Especificaciones_Pantalla1_idx');


            $table->foreign('Modelo_idModelo', 'fk_Especificaciones_Modelo1_idx')
                ->references('idModelo')->on('Modelo')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Pantalla_idPantalla', 'fk_Especificaciones_Pantalla1_idx')
                ->references('idPantalla')->on('Pantalla')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Bateria_idBateria', 'fk_Especificaciones_Bateria1_idx')
                ->references('idBateria')->on('Bateria')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Procesador_idProcesador', 'fk_Especificaciones_Procesador1_idx')
                ->references('idProcesador')->on('Procesador')
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
