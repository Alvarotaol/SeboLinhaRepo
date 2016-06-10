<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnuncioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Anuncio', function(Blueprint $table)
		{
			$table->foreign('idLivro', 'fk_livro')->references('id')->on('Livro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idUsuario', 'fk_anunciante')->references('id')->on('Usuario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Anuncio', function(Blueprint $table)
		{
			$table->dropForeign('fk_livro');
			$table->dropForeign('fk_anunciante');
		});
	}

}
