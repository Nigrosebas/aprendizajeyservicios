<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alumnos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fecha_nacimiento');
			$table->integer('id_university');
			$table->string('email');
			$table->string('nombre');
			$table->string('telefono');
			$table->string('region');
			$table->string('ciudad');
			$table->string('direccion');
			$table->string('foto_perfil');
			$table->string('licencia_conducir');
			$table->string('descripcion');
			$table->integer('rut_alumno');
            $table->foreign('rut_alumno')->references('rut')->on('usuarios');
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
		Schema::drop('alumnos');
	}

}
