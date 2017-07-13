<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanificationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('planifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_project');
			$table->integer('rut');
			$table->string('pregunta1');
			$table->string('pregunta2');
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
		Schema::drop('planifications');
	}

}
