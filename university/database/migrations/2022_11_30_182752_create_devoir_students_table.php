<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevoirStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoir_students', function (Blueprint $table) {
            $table->id();
            $table->string('code',20)->nullable();
            $table->string('note',10)->nullable();
            $table->string('label',255)->nullable();
            $table->unsignedBigInteger('devoir_id');
            $table->foreign('devoir_id')->references('id')->on('devoirs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('devoir_students');
    }
}
