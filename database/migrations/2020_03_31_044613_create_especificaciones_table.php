<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modelos_id')->unsigned();
            $table->integer('pantallas_id')->unsigned();
            $table->integer('baterias_id')->unsigned();
            $table->timestamps();

            $table->foreign('modelos_id')->references('id')->on('modelos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('baterias_id')->references('id')->on('baterias')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pantallas_id')->references('id')->on('pantallas')
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
        Schema::dropIfExists('especificaciones');
    }
}
