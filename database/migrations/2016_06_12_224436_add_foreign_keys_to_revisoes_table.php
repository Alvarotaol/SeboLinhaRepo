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
		Schema::table('revisoes', function(Blueprint $table)
		{
			$table->foreign('idUsuario', 'fk_criador')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idLivro', 'fk_livro_id2')->references('id')->on('livros')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('revisoes', function(Blueprint $table)
		{
			$table->dropForeign('fk_criador');
			$table->dropForeign('fk_livro_id2');
		});
	}

}
