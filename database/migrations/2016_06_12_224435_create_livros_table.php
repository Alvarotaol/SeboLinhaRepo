<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLivrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('livros', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 600);
			$table->string('isbn', 45)->nullable()->unique('isbn_UNIQUE');
			$table->string('idioma', 45);
			$table->string('autor', 60)->nullable();
			$table->text('sumario')->nullable();
			$table->date('lancamento');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('livros');
	}

}
