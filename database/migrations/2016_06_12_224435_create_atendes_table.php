<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAtendesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atendes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('data');
			$table->integer('idUsuario');
			$table->integer('idAnuncio');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('atendes');
	}

}
