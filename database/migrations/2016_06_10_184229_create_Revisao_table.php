<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRevisaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Revisao', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('texto', 45);
			$table->dateTime('data');
			$table->integer('idUsuario')->index('fk_criador');
			$table->integer('idLivro')->index('fk_livro_id2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Revisao');
	}

}
