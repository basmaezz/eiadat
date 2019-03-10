<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_lists', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('type');
            $table->integer('doctorId');
            $table->integer('patientId');
            $table->integer('processId');
            $table->date('processDate');
            $table->integer('state');
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
        Schema::dropIfExists('process_lists');
    }
}
