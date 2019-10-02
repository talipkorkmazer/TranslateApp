<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranslateLogsTable extends Migration {

	public function up()
	{
		Schema::create('translate_logs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('translated')->nullable();
			$table->text('searched')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('translate_logs');
	}
}