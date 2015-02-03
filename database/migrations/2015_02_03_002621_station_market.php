<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StationMarket extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('station_market', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('station_id');
			
			$table->string('commodity');
			$table->integer('purchase_value')->nullable();
			$table->integer('cost_value')->nullable();
			$table->integer('demand')->nullable();
			$table->integer('supply')->nullable();

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
		
		Schema::drop('station_market');
	}

}
