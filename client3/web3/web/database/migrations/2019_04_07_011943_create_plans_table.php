<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePlansTable.
 */
class CreatePlansTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans', function(Blueprint $table) {
			$table->increments('id');
			
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('stripe_plan');
            $table->float('cost');
			$table->text('description')->nullable();
			
			$table->timestamps();	
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
		Schema::drop('plans');
	}
}
