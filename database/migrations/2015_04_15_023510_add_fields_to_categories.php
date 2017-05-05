<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function(Blueprint $table)
		{

			$table->boolean('display_homepage_1')->default(false);
			$table->boolean('display_homepage_2')->default(false);
			$table->boolean('display_homepage_3')->default(false);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->dropColumn('display_homepage_1');
			$table->dropColumn('display_homepage_2');
			$table->dropColumn('display_homepage_3');

		});
	}

}
