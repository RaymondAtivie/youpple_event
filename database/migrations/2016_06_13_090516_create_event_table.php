<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->text('venue');
            $table->timestamp('datetime');
            $table->timestamps();
        });

        Schema::create('event_types', function (Blueprint $table){
            $table->increments('id');
            $table->string("name");
            $table->timestamps();
        });

        Schema::create('event_event_type', function (Blueprint $table){
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->integer('event_type_id')->unsigned()->index();
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');

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
        Schema::drop('event_event_type');
        Schema::drop('event_types');
        Schema::drop('events');
    }
}
