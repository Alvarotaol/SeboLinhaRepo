<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosRevisoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios_revisoes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('nota')->default(0)->unsigned();
			$table->integer('idUsuario')->index('fk_usuario');
			$table->integer('idRevisao')->index('fk_revisao');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios_revisoes');
	}

}
