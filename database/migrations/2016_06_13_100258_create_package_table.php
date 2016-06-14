<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('title');
            $table->text('description');
            $table->string('fee_currency');
            $table->string('fee_amount');
            $table->string('fee_style');
            $table->timestamps();
        });

        Schema::create('package_package_fee_type', function (Blueprint $table) {
            $table->integer('package_id');
            $table->integer('package_fee_type_id');
            $table->timestamps();
        });

        Schema::create('package_fee_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('package_package_fee_type');
        Schema::drop('package_fee_types');
        Schema::drop('packages');
    }
}
