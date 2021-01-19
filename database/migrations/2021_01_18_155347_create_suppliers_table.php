<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supp_comp_code')->nullable();
            $table->string('supp_comp_name')->nullable();
            $table->string('supp_account_name')->nullable();
            $table->string('supp_acc_no')->nullable();
            $table->string('supp_bank_name')->nullable();
            $table->string('supp_swift')->nullable();
            $table->string('supp_iban')->nullable();

            $table->string('supp_created_uid')->nullable();
            $table->string('supp_created_name')->nullable();
            $table->string('supp_status')->nullable();
            $table->string('supp_contact')->nullable();

            $table->string('supp_flex1')->nullable();
            $table->string('supp_flex2')->nullable();
            $table->string('supp_flex3')->nullable();



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
        Schema::dropIfExists('suppliers');
    }
}
