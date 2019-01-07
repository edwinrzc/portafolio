<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportacionDeudaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importacion_deudas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_doc',4);
            $table->string('nro_documento',12);
            $table->string('cliente',50);
            $table->string('producto',20);
            $table->string('nro_producto',30);
            $table->date('fecha_mora');
            $table->string('deuda',30);
            $table->string('moneda',15);
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
        Schema::dropIfExists('importacion_deudas');
    }
}
