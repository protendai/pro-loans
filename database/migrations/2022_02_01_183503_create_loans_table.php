<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_number');
            $table->smallInteger('user_id');
            $table->double('period');
            $table->double('amount_borrowed');
            $table->double('interest');
            $table->double('total_repayment');
            $table->date('date_application');
            $table->date('date_approval')->nullable();
            $table->date('date_payment')->nullable();
            $table->date('date_due')->nullable();
            $table->smallInteger('status');
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
        Schema::dropIfExists('loans');
    }
}
