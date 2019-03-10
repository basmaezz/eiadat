<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('discount');
            $table->string('specialId');
            $table->string('titleId');
            $table->string('countryId');
            $table->string('cityId');
            $table->string('hotline');
            $table->string('price');
            $table->string('about');
            $table->string('doctorService');
            $table->string('clinicTime');
            $table->string('doctorImage');
            $table->string('clinicImage');
            $table->string('clinicService');
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
        Schema::dropIfExists('user_details');
    }
}
