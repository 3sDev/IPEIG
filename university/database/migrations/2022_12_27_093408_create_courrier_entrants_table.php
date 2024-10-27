<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourrierEntrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_entrants', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ordre',100)->nullable();
            $table->string('date_arrivee',50)->nullable();
            $table->string('numero_courrier',50)->nullable();
            $table->string('date_courrier',50)->nullable();
            $table->string('source',150)->nullable();
            $table->text('sujet')->nullable();
            $table->string('piece_jointe',20)->nullable();
            $table->string('destinataire',150)->nullable();
            $table->string('date_livraison',50)->nullable();
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
        Schema::dropIfExists('courrier_entrants');
    }
}
