<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('topics_answers', function($table)
	    {
	        $table->increments('taid');
	        $table->integer('tid');
	        $table->string('author');
	        $table->string('title');
	        $table->text('message');
			$table->softDeletes();
	        $table->timestamps();
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics_answers');
	}

}
