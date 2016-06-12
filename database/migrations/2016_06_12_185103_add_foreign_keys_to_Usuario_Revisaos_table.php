<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuarioRevisaosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Usuario_Revisaos', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'fk_revisao')->references('id')->on('Revisoes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idRevisao', 'fk_usuario')->references('id')->on('Usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Usuario_Revisaos', function(Blueprint $table)
		{
			$table->dropForeign('fk_revisao');
			$table->dropForeign('fk_usuario');
		});
	}

}
