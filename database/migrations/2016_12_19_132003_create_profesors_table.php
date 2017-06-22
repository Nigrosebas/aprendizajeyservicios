<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profesors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('email');
			$table->string('telefono');
			$table->string('foto_perfil');
			$table->integer('id_university')->unsigned();
			$table->foreign('id_university')->references('id')->on('universities');
			$table->integer('rut_profesor');
			$table->foreign('rut_profesor')->references('rut')->on('usuarios');
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
		Schema::drop('profesors');
	}

}
