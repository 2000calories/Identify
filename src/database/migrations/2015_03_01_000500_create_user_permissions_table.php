<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Regulus\Identify\Facade as Auth;

class CreateUserPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Auth::getTableName('user_permissions'), function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('permission_id');

			$table->nullableTimestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(Auth::getTableName('user_permissions'));
	}

}