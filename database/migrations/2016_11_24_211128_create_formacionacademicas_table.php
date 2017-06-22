<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacionacademicasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('formacionacademicas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('periodo');
			$table->string('nivel');
			$table->string('institucion');
			$table->string('nombre');
			$table->string('estado');
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
		Schema::drop('formacionacademicas');
	}

}
