<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->integer('id');
            $table->string('ChoiceCode');
            $table->string('CourseName');
            $table->string('Institute');
            $table->string('Exam(JEE/MHT-CET)');
            $table->string('Type');
            $table->string('SeatType');
            $table->integer('MeritScore');
            $table->double('Percentile');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
