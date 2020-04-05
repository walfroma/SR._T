<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Negocio', 100)->nullable();
            $table->string('Telefono', 45)->nullable();
            $table->string('Direccion', 100)->nullable();
            $table->string('Ubicacion', 200)->nullable();
            $table->string('Correo', 100)->nullable();
            $table->integer('usuarios_id')->unsigned();
            $table->timestamps();




            $table->foreign('usuarios_id')->references('id')->on('users')
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
        Schema::dropIfExists('negocios');
    }
}
