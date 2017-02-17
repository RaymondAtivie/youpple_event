<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventAwardsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('event_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->string("title");
            $table->text("description");
            $table->enum("enable_registration", ['true', 'false'])->default("false");
            $table->enum("enable_voting", ['true', 'false'])->default("false");
            $table->dateTime("voting_end_date");
            $table->timestamps();
        });

        Schema::create('contestants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('award_id')->unsigned();
            $table->string("image");
            $table->string("name");
            $table->text("description");
            $table->integer("vote");
            $table->timestamps();
        });

        Schema::create('contestant_event_award', function(Blueprint $table){
            $table->integer('event_award_id')->unsigned()->index();
            $table->foreign('event_award_id')->references('id')->on('event_awards')->onDelete('cascade');

            $table->integer('contestant_id')->unsigned()->index();
            $table->foreign('contestant_id')->references('id')->on('contestants')->onDelete('cascade');

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
        Schema::drop('contestant_event_award');
        Schema::drop('contestants');
        Schema::drop('event_awards');
    }
}
