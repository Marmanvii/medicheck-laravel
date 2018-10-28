<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('rut')->unique();
          $table->string('name');
          $table->string('last_name');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('type'); // Usuario=user; Secretraria=secre; Médico=medic; Administrador=admin;
          $table->unsignedInteger('department_id')->nullable()->unsigned();
          $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade'); // solo los médicos tienen especialidad
          $table->integer('valor'); // valor de la consulta médica
          $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
