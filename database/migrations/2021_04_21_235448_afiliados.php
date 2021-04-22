<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Afiliados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Matricula');
            $table->string('Apellidos')->nullable();
            $table->string('Nombres')->nullable();
            $table->string('Profesion')->nullable();
            $table->date('FechaNacimiento')->nullable();
            $table->string('LugarNacimiento')->nullable();
            $table->string('Sexo')->nullable();
            $table->string('EstadoCivil')->nullable();
            $table->string('Domicilio')->nullable();
            $table->string('Provicia')->nullable();
            $table->string('Localidad')->nullable();
            $table->string('Departamento')->nullable();
            $table->string('Municipio')->nullable();
            $table->string('Telefono')->nullable();
            $table->string('Email')->nullable();
            $table->date('FechaSolicitud')->nullable();
            $table->string('EstadoAfiliacion')->nullable();
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
        Schema::dropIfExists('afiliados');
    }
}