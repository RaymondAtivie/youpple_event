<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('event_id');

            $table->string('name');
            $table->string('email');
            $table->string('phone');

            $table->string('packages');
            $table->string('total');
            $table->string('transaction_ref');
            $table->string('ticket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
