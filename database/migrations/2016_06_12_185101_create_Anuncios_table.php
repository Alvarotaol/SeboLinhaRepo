<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnunciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Anuncios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('tipo')->default(0);
			$table->dateTime('dataDev')->nullable();
			$table->float('preco', 10, 0)->nullable();
			$table->dateTime('data');
			$table->integer('idLivro')->nullable()->index('fk_livro');
			$table->integer('idUsuario')->nullable()->index('fk_anunciante');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Anuncios');
	}

}
