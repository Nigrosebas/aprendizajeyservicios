<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_encargado');
			$table->string('email_encargado');
			$table->string('telefono_encargado');
			$table->string('nombre_empresa');
			$table->string('clasificacion');
			$table->string('web');
			$table->string('pais');
			$table->integer('rut_encargado')->unique();
			$table->foreign('rut_encargado')->references('rut')->on('usuarios');
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
		Schema::drop('empresas');
	}

}
