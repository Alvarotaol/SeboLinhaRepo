<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriaLivroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Categoria_Livro', function(Blueprint $table)
		{
			$table->foreign('id', 'fk_categoria')->references('id')->on('Categoria')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id', 'fk_livro_id')->references('id')->on('Livro')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Categoria_Livro', function(Blueprint $table)
		{
			$table->dropForeign('fk_categoria');
			$table->dropForeign('fk_livro_id');
		});
	}

}
