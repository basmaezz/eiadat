<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRochtaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rochta_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rochtaId');
            $table->integer('parentId');
            $table->integer('drugId');
            $table->string('usages');

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
        Schema::dropIfExists('rochta_details');
    }
}
