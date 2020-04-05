<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Modelo', 45)->nullable();
            $table->integer('marcas_id')->unsigned();
            $table->string('resolucion', 45)->nullable();
            $table->string('Cam_Tras', 45)->nullable();
            $table->string('Cam_Front', 45)->nullable();
            $table->string('MicroSD', 45)->nullable();
            $table->string('Lector_Huella', 45)->nullable();
            $table->string('SistemaOperativo', 45)->nullable();
            $table->string('Ram', 45)->nullable();
            $table->string('Almacenamiento', 45)->nullable();
            $table->string('Procesador', 300)->nullable();
            $table->string('Descripcion', 300)->nullable();
            $table->timestamps();

            $table->foreign('marcas_id')->references('id')->on('marcas')
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
        Schema::dropIfExists('modelos');
    }
}
