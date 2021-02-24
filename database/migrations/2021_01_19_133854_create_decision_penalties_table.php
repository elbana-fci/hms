<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionPenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_penalties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('decision_id');
            $table->unsignedBigInteger('penalty_id');
            $table->timestamps();

            $table->foreign('decision_id')->references('id')->on('decisions');
            $table->foreign('penalty_id')->references('id')->on('penalties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decision_penalties');
    }
}
