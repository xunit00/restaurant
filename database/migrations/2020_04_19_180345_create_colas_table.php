<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('num_orden');
            $table->time('tiempo_preparacion');
            $table->string('estado');
            $table->string('descripcion_plato');
            $table->integer('receta_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colas');
    }
}
