<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaprofesionalsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experienciaprofesionals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('periodo');
			$table->string('empresa');
			$table->string('pais');
			$table->string('ciudad');
			$table->string('cargo');
			$table->string('contactoempresa');
			$table->string('urlempresa');
			$table->integer('id_alumno')->unsigned();
			$table->foreign('id_alumno')->references('id')->on('alumnos');
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
		Schema::drop('experienciaprofesionals');
	}

}
