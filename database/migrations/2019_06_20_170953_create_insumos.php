<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('unidad_id');
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->decimal('existencia',8,2)->nullable();
            $table->decimal('maximo',8,2)->nullable();
            $table->decimal('reorden',8,2)->nullable();
            $table->decimal('minimo',8,2)->nullable();
            $table->decimal('precio_venta',8,2)->nullable();
            $table->decimal('costo',8,2)->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categoria_id')->references('id')->on('categorias_insumos')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
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
        Schema::dropIfExists('insumos');
        Schema::enableForeignKeyConstraints();
    }
}
