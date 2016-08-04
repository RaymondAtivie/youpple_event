<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');

            $table->string('picture');
            $table->string('cv');
            $table->string('company_profile');
            $table->string('business_name');
            $table->string('id_type');
            $table->string('id_number');
            $table->string('gender');
            $table->string('dob');
            $table->string('dor');
            $table->string('address');
            $table->string('currency');

            $table->string('social_twitter');
            $table->string('social_facebook');
            $table->string('social_bbm');
            $table->string('social_instagram');
            $table->string('social_google');

            $table->string('desc_eye_color');
            $table->string('desc_hair_color');
            $table->string('desc_height');
            $table->string('desc_weight');
            $table->string('desc_sleeve');
            $table->string('desc_waist');
            $table->string('desc_lap');
            $table->string('desc_dl');
            $table->string('desc_back');
            $table->string('desc_bust');
            $table->string('desc_trouser');

            $table->string('description');
            $table->string('intrests');
            $table->string('event_services');

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
        //
    }
}
