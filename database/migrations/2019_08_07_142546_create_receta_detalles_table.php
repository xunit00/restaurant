<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('receta_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('unidad_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->primary(['receta_id','producto_id','unidad_id']);
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->foreign('producto_id')->references('producto_id')->on('productos_unidades');
            $table->foreign('unidad_id')->references('unidad_id')->on('productos_unidades');
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
        Schema::dropIfExists('receta_detalles');
        Schema::enableForeignKeyConstraints();
    }
}
