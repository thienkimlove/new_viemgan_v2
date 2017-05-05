<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldToVideos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('videos', function(Blueprint $table)
		{
			$table->string('title')->nullable();
			$table->string('slug', 200)->nullable();
			$table->text('desc')->nullable();
			$table->string('image')->nullable();
			$table->integer('views')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('videos', function(Blueprint $table)
		{
			$table->dropColumn([
				'title',
				'slug',
				'desc',
				'image',
				'views'
			]);
		});
	}

}
