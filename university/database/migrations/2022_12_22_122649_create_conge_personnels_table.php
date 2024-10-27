<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conge_personnels', function (Blueprint $table) {
            $table->id();
            $table->string('description',255)->nullable();
            $table->integer('conge_annual')->nullable();
            $table->integer('conge_exceptionnel')->nullable();
            $table->integer('conge_compensatoire')->nullable();
            $table->integer('conge_maladie')->nullable();
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
        Schema::dropIfExists('conge_personnels');
    }
}
