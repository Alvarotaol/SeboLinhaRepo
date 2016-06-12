<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDenunciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Denuncias', function(Blueprint $table)
		{
			$table->foreign('id', 'fk_denunciante')->references('id')->on('Usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id', 'fk_denunciado')->references('id')->on('Usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Denuncias', function(Blueprint $table)
		{
			$table->dropForeign('fk_denunciante');
			$table->dropForeign('fk_denunciado');
		});
	}

}