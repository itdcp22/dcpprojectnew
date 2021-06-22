<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ui_comp_id')->nullable();
            $table->string('ui_comp_name')->nullable();
            $table->integer('ui_brand_id')->nullable();
            $table->string('ui_brand_name')->nullable();
            $table->date('ui_doo')->nullable(); //Date Of Opening
            $table->string('ui_type')->nullable(); //Example: EB, Water, Cwater
            $table->string('ui_cycle')->nullable(); //Example: Billing cycle - Monthly, quater

            $table->date('ui_from_date')->nullable(); //From Date
            $table->date('ui_to_date')->nullable(); //To Date

            $table->string('ui_month')->nullable();
            $table->integer('ui_year')->nullable();
            $table->integer('ui_open_bal')->nullable(); //Portal Opening balance
            $table->string('ui_unit_no')->nullable(); //Unit Number
            $table->string('ui_location')->nullable(); //Floor
            $table->string('ui_size')->nullable(); //Size in SQM           
            $table->date('ui_tran_date')->nullable(); //Transaction Date
            $table->integer('ui_tran_no')->nullable(); //Transaction Number
            $table->integer('ui_inv_no')->nullable(); //Invoice Number
            $table->integer('ui_omr')->nullable(); //Opening Meater Reading
            $table->integer('ui_cmr')->nullable(); //Closing Meater Reading
            $table->double('ui_rate')->nullable(); //Rate
            $table->integer('ui_consumed')->nullable(); //Unit consumed
            $table->double('ui_amount')->nullable(); //Amount
            $table->double('ui_sewage')->nullable(); //Sewage 30% from the amount of water consumed
            $table->double('ui_vat')->nullable(); //VAT
            $table->double('ui_netamount')->nullable(); //Net Amount = Amount + vat
            $table->string('ui_remarks')->nullable(); //Net Amount = Amount + vat
            $table->integer('ui_created_uid')->nullable();
            $table->string('ui_created_name')->nullable();
            $table->integer('ui_approved_uid')->nullable();
            $table->string('ui_approved_name')->nullable();
            $table->date('ui_approved_date')->nullable();
            $table->string('ui_verified')->nullable();
            $table->string('ui_payment_status')->nullable();
            $table->string('ui_payment_mode')->nullable();
            $table->double('ui_receipt_amount')->nullable();
            $table->string('ui_bank_name')->nullable();
            $table->integer('ui_cheque_no')->nullable();
            $table->integer('ui_payment_follow1')->nullable();
            $table->integer('ui_payment_follow2')->nullable();
            $table->integer('ui_payment_follow3')->nullable();
            $table->string('ui_batch')->nullable(); //Batch or indivudal for more then one reading
            $table->string('ui_lock')->nullable(); //Locked can not be edited
            $table->string('ui_group')->nullable(); //To group the invoice items
            $table->string('ui_email_status')->nullable(); //To group the invoice items
            $table->string('ui_online')->nullable(); //To give online option to view the invoice in portal for tenents
            $table->string('ui_attach')->nullable();
            $table->string('ui_flex1')->nullable();
            $table->string('ui_flex2')->nullable();
            $table->string('ui_flex3')->nullable();
            $table->string('ui_flex4')->nullable();
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
        Schema::dropIfExists('utilities');
    }
}
