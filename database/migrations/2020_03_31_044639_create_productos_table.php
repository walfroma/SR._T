<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('negocios_id')->unsigned();
            $table->string('Categoria', 45)->nullable();
            $table->integer('modelos_id')->unsigned();
            $table->integer('tipo_reparacions_id')->nullable()->unsigned();
            $table->string('Descripcion2')->nullable();
            $table->integer('Stock')->nullable();
            $table->float('Precio')->nullable();
            $table->string('estado', 45);
            $table->timestamps();

            $table->foreign('negocios_id')->references('id')->on('negocios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modelos_id')->references('id')->on('modelos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tipo_reparacions_id')->references('id')->on('tipo_reparacions')
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
        Schema::dropIfExists('productos');
    }
}
