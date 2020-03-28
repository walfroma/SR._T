<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre', 45)->nullable();
            $table->string('Apellido', 45)->nullable();
            $table->string('Telefono', 45)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Correo', 100);
            $table->string('Contraseña', 45);
            $table->string('V_Contraseña', 45);
            $table->integer('lugars_id')->unsigned();
            $table->string('Tipo_Usuario', 45)->nullable();
            $table->timestamps();

            $table->index(["lugars_id"], 'fk_usuarios_lugars_idx');


            $table->foreign('lugars_id', 'fk_usuarios_lugars_idx')
                ->references('id')->on('lugars')
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
        Schema::dropIfExists('usuarios');
    }
}
