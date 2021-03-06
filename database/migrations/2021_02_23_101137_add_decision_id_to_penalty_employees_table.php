<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDecisionIdToPenaltyEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penalty_employees', function (Blueprint $table) {
            $table->unsignedBigInteger('decision_id');
            $table->foreign('decision_id')->references('id')->on('decisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penalty_employees', function (Blueprint $table) {
            $table->dropColumn('decision_id');
        });
    }
}
