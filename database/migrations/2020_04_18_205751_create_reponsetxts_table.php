<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsetxtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponsetxts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('examen_passer_id');
            $table->unsignedInteger('question_id');
            $table->string('reponsetext')->default('pas de reponse');
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
        Schema::dropIfExists('reponsetxts');
    }
}
