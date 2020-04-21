<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreparacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('insumo_id');//huevo
            $table->string('tipo_preparacion');//guisado
            $table->decimal('tiempo');//2.2
            $table->timestamps();

            $table->foreign('insumo_id')->references('id')->on('insumos');
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
        Schema::dropIfExists('preparacions');
        Schema::enableForeignKeyConstraints();
    }
}
