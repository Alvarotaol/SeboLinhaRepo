<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAtendesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Atendes', function(Blueprint $table)
		{
			$table->foreign('id', 'fk_anuncio')->references('id')->on('Anuncios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id', 'fk_usuario_id')->references('id')->on('Usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Atendes', function(Blueprint $table)
		{
			$table->dropForeign('fk_anuncio');
			$table->dropForeign('fk_usuario_id');
		});
	}

}
