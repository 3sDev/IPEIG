<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamation_personnels', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('post_image')->nullable();
            $table->string('statut');
            $table->string('reponse')->nullable();

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
        Schema::dropIfExists('reclamation_personnels');
    }
}
