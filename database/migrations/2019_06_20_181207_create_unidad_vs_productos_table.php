<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadVsProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_unidades', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('unidad_id');
            $table->integer('cantidad');
            $table->decimal('precio_venta',8,2);
            $table->decimal('costo',8,2);
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('unidad_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('productos_unidades');
        Schema::enableForeignKeyConstraints();
    }
}
