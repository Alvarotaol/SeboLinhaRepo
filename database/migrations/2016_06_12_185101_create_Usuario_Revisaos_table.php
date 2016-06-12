<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioRevisaosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Usuario_Revisaos', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('nota')->unsigned()->default(0);
			$table->integer('idUsuario')->index('fk_revisao');
			$table->integer('idRevisao')->index('fk_usuario');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Usuario_Revisaos');
	}

}
