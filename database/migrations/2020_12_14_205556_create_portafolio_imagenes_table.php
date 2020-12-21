<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortafolioImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portafolio_imagenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('portafolio_id')->unsigned();
            $table->foreign('portafolio_id')->references('id')->on('portafolios');
            $table->string('nombre',150);
            $table->string('directorio');
            $table->string('tipo',50);
            $table->string('titulo',150)->nullable();
            $table->text('descripcion')->nullable();            
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
        Schema::dropIfExists('portafolio_imagenes');
    }
}
