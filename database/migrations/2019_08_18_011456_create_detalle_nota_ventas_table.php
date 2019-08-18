<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleNotaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_nota_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nota_venta_id');
            $table->unsignedBigInteger('producto_id');
            $table->decimal('cantidad');
            $table->decimal('precio');
            $table->decimal('descuento')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nota_venta_id')->references('id')->on('nota_ventas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_nota_ventas');
        Schema::enableForeignKeyConstraints();
    }
}
