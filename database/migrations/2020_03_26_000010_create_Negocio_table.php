<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegocioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Negocio';

    /**
     * Run the migrations.
     * @table Negocio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idNegocio');
            $table->string('Negociol', 100)->nullable();
            $table->string('Telefono', 45)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Ubicacion', 200)->nullable();
            $table->string('Correo', 100)->nullable();
            $table->integer('Usuario_idUsuario')->unsigned();

            $table->index(["Usuario_idUsuario"], 'fk_Negocio_Usuario1_idx');


            $table->foreign('Usuario_idUsuario', 'fk_Negocio_Usuario1_idx')
                ->references('idUsuario')->on('Usuario')
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
