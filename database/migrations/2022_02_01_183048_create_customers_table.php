<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->string('national_id')->nullable();
            $table->string('phone');
            $table->string('province');
            $table->string('district');
            $table->string('address');
            $table->string('copy_national_id')->nullable();
            $table->string('copy_residence')->nullable();
            $table->string('copy_bank')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
