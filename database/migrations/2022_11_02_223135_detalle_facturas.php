<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('detalle_factura', function (Blueprint $table){
                $table->id();
                $table->unsignedBigInteger('fk_facturas');
                $table->unsignedBigInteger('fk_articulos');
                $table->integer('cantidad');

                $table->foreign('fk_facturas')->references('id')->on('facturas')->onDelete('cascade');
                $table->foreign('fk_articulos')->references('id')->on('productos')->onDelete('cascade');
            });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
