<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRevisaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Revisao', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'fk_criador')->references('id')->on('Usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idLivro', 'fk_livro_id2')->references('id')->on('Livro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Revisao', function(Blueprint $table)
		{
			$table->dropForeign('fk_criador');
			$table->dropForeign('fk_livro_id2');
		});
	}

}
