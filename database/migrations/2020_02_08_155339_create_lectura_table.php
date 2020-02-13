<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_lectura');
            $table->date('fecha_lectura_grafica');
            $table->decimal('i_r',5,2);
            $table->decimal('i_s',5,2);
            $table->decimal('i_t',5,2);
            $table->string('ruidos');
            $table->decimal('temperatura_menor_a');
            $table->string('rango_lectura');
            $table->string('anio');
            $table->integer('autor_user_id')->nullable(true)->comment('id de la planta al que pertenece');
            $table->integer('supervisor_user_id')->nullable(true)->comment('id del sistema al que pertenece');
            $table->integer('componente_id')->nullable(true)->comment('id del sistema al que pertenece');
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
        Schema::dropIfExists('lectura');
    }
}
