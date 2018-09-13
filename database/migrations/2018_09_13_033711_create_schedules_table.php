<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medics_id');
            $table->foreign('medics_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('lunes');
            $table->integer('martes');
            $table->integer('miercoles');
            $table->integer('jueves');
            $table->integer('viernes');
            $table->integer('duracion');
            $table->timestamps();
            // los días de la semana tendrán un valor según el horario de trabajo del médico
            // 0 = no trabaja; 1 = trabaja solo en la mañana; 2 = trabaja solo en la tarde; 3 = trabaja todo el día.
            // duración = tiempo de consulta de cada médico.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
