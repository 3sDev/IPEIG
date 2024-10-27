<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageServiceUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_service_users', function (Blueprint $table) {
            $table->id();
            $table->string('statut', 20)->nullable();
            $table->string('deleted', 20)->nullable();

            $table->unsignedBigInteger('message_services_id');
            $table->foreign('message_services_id')->references('id')->on('message_services');

            $table->unsignedBigInteger('user_sender_id');
            $table->foreign('user_sender_id')->references('id')->on('users');

            $table->unsignedBigInteger('user_receiver_id');
            $table->foreign('user_receiver_id')->references('id')->on('users');
            
            $table->rememberToken();
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
        Schema::dropIfExists('message_service_users');
    }
}
