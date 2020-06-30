<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('comp_code')->nullable();
            $table->string('comp_name')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('tran_date')->nullable();
            $table->string('tran_number')->nullable();
            $table->string('name')->nullable();
            $table->date('chq_date')->nullable();
            $table->double('chq_amount')->nullable();
            $table->string('chq_number')->unique();
            $table->string('reference')->nullable();
            $table->string('narration')->nullable();
            $table->string('tran_total')->nullable();
            $table->string('status')->nullable();
            $table->date('status_date')->nullable(); 
            $table->string('currency')->nullable();
            $table->string('account_year')->nullable();
            $table->string('account_month')->nullable();
            
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            
            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
            $table->string('flex3')->nullable();
            $table->date('flex4')->nullable();
            $table->date('flex5')->nullable();
            $table->timestamps();

            // Status 0 - Not cleared
            // Status 1 - Cleared
            // Status 2 - Canceled
            // Status 3 - Bounced
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheques');
    }
}
