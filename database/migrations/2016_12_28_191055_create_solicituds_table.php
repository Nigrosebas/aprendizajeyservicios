<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicituds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_empresa');
			$table->string('clasificacion');
			$table->string('ubicacion');
			$table->string('prioridad');
			$table->string('area');
			$table->string('nivel');
			$table->string('duracion');
			$table->string('requerido');
			$table->integer('rut_encargado');
			$table->foreign('rut_encargado')->references('rut_encargado')->on('empresas');
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
		Schema::drop('solicituds');
	}

}
