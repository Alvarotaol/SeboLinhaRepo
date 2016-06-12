<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRevisoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Revisoes', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'fk_criador')->references('id')->on('Usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idLivro', 'fk_livro_id2')->references('id')->on('Livros')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Revisoes', function(Blueprint $table)
		{
			$table->dropForeign('fk_criador');
			$table->dropForeign('fk_livro_id2');
		});
	}

}
