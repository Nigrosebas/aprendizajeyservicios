<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certificados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('certificadora');
			$table->string('certificado');
			$table->string('fecha');
			$table->string('observacion');
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
		Schema::drop('certificados');
	}

}
