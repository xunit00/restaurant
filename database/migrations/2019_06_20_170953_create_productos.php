<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('unidad_id');
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->decimal('existencia');
            $table->decimal('maximo');
            $table->decimal('reorden');
            $table->decimal('minimo');
            $table->decimal('precio_venta',8,2);
            $table->decimal('costo',8,2);
            $table->string('imagen')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('productos');
        Schema::enableForeignKeyConstraints();
    }
}
