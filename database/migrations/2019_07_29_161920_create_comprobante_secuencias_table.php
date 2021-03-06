<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobanteSecuenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobante_secuencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('secuencia');
            $table->unsignedBigInteger('tipo_id');
            $table->boolean('status')->default(1);
            $table->date('fecha_vencimiento')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipo_id')->references('id')->on('comprobante_tipos')->onDelete('cascade');
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
        Schema::dropIfExists('comprobante_secuencias');
        Schema::enableForeignKeyConstraints();
    }
}
