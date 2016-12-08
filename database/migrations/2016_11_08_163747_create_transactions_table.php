<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('no_agenda');
            $table->string('id_registrasi',30);
            $table->unique('id_registrasi');
            $table->string('id_customer',30);
            $table->string('daya_lama',5)->nullable();
            $table->string('daya_baru',5);
            $table->date('tanggal');

            $table->index('id_customer');
            $table->index('daya_lama');
            $table->index('daya_baru');
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
		Schema::drop('transactions');
	}

}
