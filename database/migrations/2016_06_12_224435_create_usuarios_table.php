<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45);
			$table->string('email', 45)->unique('email_UNIQUE');
			$table->string('cpf', 45)->unique('cpf_UNIQUE');
			$table->string('endereco', 45)->nullable();
			$table->string('cidade', 45)->nullable();
			$table->string('estado', 45)->nullable();
			$table->binary('moderador', 1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
