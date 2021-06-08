<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_analyses', function (Blueprint $table) {
            $table->id('consultationAnalyse');
            $table->timestamps();
            $table->foreignId('id_consultation')->references('id_consultation')->on('consultations');
            $table->foreignId('id_analyse')->references('id_analyse')->on('analyses');
            $table->date('dateAnalyse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultation_analyses');
    }
}
