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
        Schema::create('recordmus', function (Blueprint $table) {
            $table->id();
            $table->string('InstituteName');
            $table->string('CourseName');
            $table->string('Location');
            $table->double('GOPEN')->nullable();
            $table->double('GSCS')->nullable();
            $table->double('GSTS')->nullable();
            $table->double('GVJS')->nullable();
            $table->double('GNT1S')->nullable();
            $table->double('GNT2S')->nullable();
            $table->double('GNT3S')->nullable();
            $table->double('GOBCS')->nullable();
            $table->double('TFWS')->nullable();
            $table->double('EWS')->nullable();
            $table->double('MI')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recordmus');
    }
};
