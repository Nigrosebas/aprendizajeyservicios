<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinadorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coordinadors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('email');
			$table->string('telefono');
			$table->integer('id_university')->unsigned();
			$table->integer('rut_coordinador');
			$table->foreign('id_university')->references('id')->on('universities');
			$table->foreign('rut_coordinador')->references('rut')->on('usuarios');
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
		Schema::drop('coordinadors');
	}

}
