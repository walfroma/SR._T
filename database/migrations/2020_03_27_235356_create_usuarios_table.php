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
            $table->integer('users_id')->unsigned();
            $table->string('Nombre', 45)->nullable();
            $table->string('Apellido', 45)->nullable();
            $table->string('Telefono', 45)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Tipo_Usuario', 45)->nullable();
            $table->integer('lugars_id')->unsigned();
            $table->timestamps();




            $table->foreign('lugars_id')->references('id')->on('lugars')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('users_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');



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
