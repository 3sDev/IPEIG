<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteProfessionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_professionnels', function (Blueprint $table) {
            $table->id();
            $table->string('annee',20);
            $table->string('note1',10);
            $table->string('note2',10)->nullable();
            $table->string('note3',10)->nullable();
            $table->string('note4',10)->nullable();
            $table->string('note_global',10)->nullable();
            $table->text('observation')->nullable();
            $table->unsignedBigInteger('personnel_id');
            $table->foreign('personnel_id')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('note_professionnels');
    }
}
