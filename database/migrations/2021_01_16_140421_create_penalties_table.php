<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->string('penalty');
            $table->string('penalty_reason');
            $table->boolean('execution');
            $table->date('execution_date');
            $table->string('issuer');
            $table->unsignedInteger('issue_number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('judgement_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('judgement_id')->references('id')->on('judgement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penalties');
    }
}
