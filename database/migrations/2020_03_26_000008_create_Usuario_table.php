<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Usuario';

    /**
     * Run the migrations.
     * @table Usuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idUsuario');
            $table->string('Nombre', 45)->nullable();
            $table->string('Apellido', 45)->nullable();
            $table->string('Telefono', 45)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Correo', 100);
            $table->string('Contraseña', 45);
            $table->string('V_Contraseña', 45);
            $table->integer('Lugar_idLugar')->unsigned();
            $table->string('Tipo_Usuario')->nullable();

            $table->index(["Lugar_idLugar"], 'fk_Usuario_Lugar_idx');


            $table->foreign('Lugar_idLugar', 'fk_Usuario_Lugar_idx')
                ->references('idLugar')->on('Lugar')
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
