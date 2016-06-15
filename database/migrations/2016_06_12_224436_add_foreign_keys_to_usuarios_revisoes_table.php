<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuariosRevisoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios_revisoes', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'fk_usuario')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idRevisao', 'fk_revisao')->references('id')->on('revisoes')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuarios_revisoes', function(Blueprint $table)
		{
			$table->dropForeign('fk_revisao');
			$table->dropForeign('fk_usuario');
		});
	}

}
