<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('classeName');
            $table->string('abbreviation');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('level_id');

            $table->foreign('department_id')->references('id')->on('departements');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('level_id')->references('id')->on('levels');

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
        Schema::dropIfExists('classes');
    }
}
