<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden__detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('plato_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('orden_id')->references('id')->on('ordens');
            $table->foreign('plato_id')->references('id')->on('productos');

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
        Schema::dropIfExists('orden__detalles');
        Schema::enableForeignKeyConstraints();
    }
}
