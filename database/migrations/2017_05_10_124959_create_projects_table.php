<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('project_name');
			$table->integer('id_profesor')->unsigned();
			$table->integer('id_university')->unsigned();
			$table->integer('year');
			$table->string('complejidad');
			$table->string('duracion');
			$table->string('evaluaciones');
			$table->string('otras_evaluaciones');
			$table->integer('porcentaje');
			$table->integer('objalcanzados');
			$table->text('resumen');
			$table->text('objetivos');
			$table->text('resultados');
			$table->text('conclusion');
			$table->string('estado');
			$table->integer('id_course')->unsigned();
			$table->integer('alumnos_table')->unsigned();
			$table->foreign('id_university')->references('id')->on('universities');
			$table->foreign('id_profesor')->references('id')->on('profesors');
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
		Schema::drop('projects');
	}

}
