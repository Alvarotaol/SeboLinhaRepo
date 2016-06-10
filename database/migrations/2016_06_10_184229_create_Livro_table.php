<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLivroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Livro', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 45);
			$table->string('isbn', 45)->nullable()->unique('isbn_UNIQUE');
			$table->string('idioma', 45);
			$table->string('autor', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Livro');
	}

}
