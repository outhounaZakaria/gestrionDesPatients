<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patiets', function (Blueprint $table) {
            $table->id('id_patient');
            $table->timestamps();
            $table->foreignId('id_users')->references('id_user')->on('users');;
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('adresse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patiets');
    }
}
