<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchOfficesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branch_offices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('phone', 191);
			$table->string('email', 191);
			$table->string('address', 191);
			$table->float('latitude', 10, 0)->nullable();
			$table->float('longitude', 10, 0)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('brand');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('branch_offices');
	}

}
