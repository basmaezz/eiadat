<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientHistroysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_histroys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patientId');
            $table->integer('doctorId');
            $table->text('disease');
            $table->text('complicationsDisease');
            $table->text('analyzes');
            $table->text('analyzesImg');
            $table->text('radiation');
            $table->text('radiationImg');
            $table->text('drugs');
            $table->text('processes');
            $table->text('notes');
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
        Schema::dropIfExists('patient_histroys');
    }
}
