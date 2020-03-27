<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Factura';

    /**
     * Run the migrations.
     * @table Factura
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idFactura');
            $table->integer('Usuario_idUsuario')->unsigned();
            $table->dateTime('Fecha')->nullable();
            $table->float('Descuento')->nullable();
            $table->float('Total')->nullable();

            $table->index(["Usuario_idUsuario"], 'fk_Factura_Usuario1_idx');


            $table->foreign('Usuario_idUsuario', 'fk_Factura_Usuario1_idx')
                ->references('idUsuario')->on('Usuario')
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
