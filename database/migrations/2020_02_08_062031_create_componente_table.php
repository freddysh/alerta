<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('codigo_parte');
            $table->string('codigo_componente');
            $table->string('acometida_alimentador');
            $table->string('primera_lectura');
            $table->string('segunda-lectura');
            $table->integer('planta_id')->nullable(true)->comment('id de la planta al que pertenece');
            $table->integer('sistema_id')->nullable(true)->comment('id del sistema al que pertenece');
            $table->integer('equipo_id')->nullable(true)->comment('id del sistema al que pertenece');
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
        Schema::dropIfExists('componente');
    }
}
