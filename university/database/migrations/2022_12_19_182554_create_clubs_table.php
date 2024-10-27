<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ar', 100);
            $table->string('nom_fr', 100);
            $table->string('description',500)->nullable();
            $table->string('logo',20)->nullable();
            $table->string('statut',20)->nullable();
            $table->string('chef',60)->nullable();
            $table->string('membre_1',60)->nullable();
            $table->string('membre_2',60)->nullable();
            $table->string('membre_3',60)->nullable();
            $table->string('membre_4',60)->nullable();
            $table->string('membre_5',60)->nullable();
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
        Schema::dropIfExists('clubs');
    }
}
