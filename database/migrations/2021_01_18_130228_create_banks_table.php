<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('bank_comp_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('bank_acc_name')->nullable();
            $table->string('bank_flex1')->nullable();
            $table->string('bank_flex2')->nullable();
            $table->string('bank_flex3')->nullable();
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
        Schema::dropIfExists('banks');
    }
}
