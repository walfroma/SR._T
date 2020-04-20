<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facturas_id')->unsigned();
            $table->integer('Cantidad')->nullable();
            $table->float('Precio')->nullable();
            $table->integer('productos_id')->unsigned();
            $table->float('Subtotal')->nullable();
            $table->timestamps();

            $table->foreign('facturas_id')->references('id')->on('facturas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('productos_id')->references('id')->on('productos')
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
        Schema::dropIfExists('detalle_ventas');
    }
}
