<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeloTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Modelo';

    /**
     * Run the migrations.
     * @table Modelo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idModelo');
            $table->string('Modelo', 45)->nullable();
            $table->integer('Marca_idMarca')->unsigned();
            $table->integer('Resolucion_idResolucion');
            $table->string('Cam_Trasera', 45)->nullable();
            $table->string('Cam_Frontal', 45)->nullable();
            $table->string('MicroSD', 45)->nullable();
            $table->string('Lector_Huella', 45)->nullable();
            $table->string('Sistema Operativo', 45)->nullable();
            $table->string('Ram', 45)->nullable();
            $table->string('Almacenamiento', 45)->nullable();

            $table->index(["Marca_idMarca"], 'fk_Modelo_Marca1_idx');


            $table->foreign('Marca_idMarca', 'fk_Modelo_Marca1_idx')
                ->references('idMarca')->on('Marca')
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
