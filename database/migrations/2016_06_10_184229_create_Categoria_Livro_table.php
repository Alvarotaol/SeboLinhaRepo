<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaLivroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Categoria_Livro', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idCategoria');
			$table->integer('idLivro');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Categoria_Livro');
	}

}
