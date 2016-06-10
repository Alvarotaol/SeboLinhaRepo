<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuarioRevisaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Usuario_Revisao', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'fk_revisao')->references('id')->on('Revisao')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idRevisao', 'fk_usuario')->references('id')->on('Usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Usuario_Revisao', function(Blueprint $table)
		{
			$table->dropForeign('fk_revisao');
			$table->dropForeign('fk_usuario');
		});
	}

}
