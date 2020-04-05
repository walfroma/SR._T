<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->dateTime('Fecha')->nullable();
            $table->float('Descuento')->nullable();
            $table->float('Total')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')
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
        Schema::dropIfExists('facturas');
    }
}
