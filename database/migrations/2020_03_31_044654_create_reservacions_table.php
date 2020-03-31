<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('Fecha_Reserva')->nullable();
            $table->dateTime('Fecha_Entrega')->nullable();
            $table->string('Estado', 30)->nullable();
            $table->integer('Cantidad')->nullable();
            $table->integer('productos_id')->nullable()->unsigned();
            $table->integer('tipo_reparacions_id')->nullable()->unsigned();
            $table->string('Tipo_Reservacion', 45)->nullable();
            $table->timestamps();

            $table->foreign('tipo_reparacions_id')->references('id')->on('tipo_reparacions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('productos_id')->references('id')->on('productos')
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
        Schema::dropIfExists('reservacions');
    }
}
