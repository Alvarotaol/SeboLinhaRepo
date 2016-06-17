<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriasLivrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categorias_livros', function(Blueprint $table)
		{
			$table->foreign('idCategoria', 'fk_categoria')->references('id')->on('categorias')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('idLivro', 'fk_livro_id')->references('id')->on('livros')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categorias_livros', function(Blueprint $table)
		{
			$table->dropForeign('fk_categoria');
			$table->dropForeign('fk_livro_id');
		});
	}

}
