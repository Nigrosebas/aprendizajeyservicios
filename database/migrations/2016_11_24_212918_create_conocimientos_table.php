<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConocimientosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conocimientos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('conocimiento');
			$table->string('nivel');
			$table->string('comentario');
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
		Schema::drop('conocimientos');
	}

}
