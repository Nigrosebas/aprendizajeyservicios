<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoProyectosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alumnoProyectos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_proyecto');
			$table->integer('rut');
			$table->string('nombre');
			$table->string('nombre_proyecto');
			$table->string('rol');
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
		Schema::drop('alumnoProyectos');
	}

}
