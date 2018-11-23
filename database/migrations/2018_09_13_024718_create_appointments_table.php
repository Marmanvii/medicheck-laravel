<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('fecha');
            $table->integer('bloque');
            $table->unsignedInteger('medics_id');
            $table->foreign('medics_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('telefono');
            $table->string('observacion');
            $table->unique(['fecha','bloque','medics_id']);
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
        Schema::dropIfExists('appointments');
    }
}
