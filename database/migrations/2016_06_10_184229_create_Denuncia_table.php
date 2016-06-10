<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDenunciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Denuncia', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('reclamacao', 65535);
			$table->integer('idDenunciante');
			$table->integer('idDenunciado');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Denuncia');
	}

}
