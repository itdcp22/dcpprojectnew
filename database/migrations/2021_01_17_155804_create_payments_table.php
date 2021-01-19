<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pay_comp_code')->nullable();
            $table->string('pay_comp_name')->nullable();
            $table->string('pay_tran_no')->nullable();
            $table->date('pay_tran_date')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('bank_acc_name')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('bank_name')->nullable();

            $table->string('pay_supp_acc_name')->nullable();
            $table->string('pay_supp_acc_no')->nullable();
            $table->string('pay_supp_bank_name')->nullable();
            $table->string('pay_supp_swift_code')->nullable();
            $table->string('pay_supp_iban')->nullable();
            $table->double('pay_supp_amount')->nullable();
            $table->string('pay_supp_currency')->nullable();
            $table->string('pay_supp_ref_no')->nullable();
            $table->string('pay_status')->nullable();
            $table->string('pay_dept')->nullable();
            $table->string('pay_stackholders')->nullable();
            $table->string('pay_created_uid')->nullable();
            $table->string('pay_created_name')->nullable();

            $table->string('pay_approved_uid')->nullable();
            $table->string('pay_approved_name')->nullable();
            $table->date('pay_approved_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('comments')->nullable();
            $table->string('flex1')->nullable();
            $table->string('flex2')->nullable();
            $table->string('flex3')->nullable();
            $table->date('flex4')->nullable();
            $table->date('flex5')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
