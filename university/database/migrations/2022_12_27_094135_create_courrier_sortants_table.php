<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourrierSortantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_sortants', function (Blueprint $table) {
            $table->id();
            $table->string('numero_inscription',100)->nullable();
            $table->string('date_edition',50)->nullable();
            $table->string('sujet',250)->nullable();
            $table->string('piece_jointe',20)->nullable();
            $table->string('destinataire',150)->nullable();
            $table->string('voie_envoi',250)->nullable();
            $table->text('observation')->nullable();
            $table->string('user',100)->nullable();
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
        Schema::dropIfExists('courrier_sortants');
    }
}
