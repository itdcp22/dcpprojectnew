<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftsales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('gv_cust_name')->nullable();
            $table->string('gv_cust_mobile')->nullable();

            $table->date('gv_inv_date')->nullable();
            $table->string('gv_inv_no')->nullable();

            $table->integer('gv_one_qty')->nullable();
            $table->integer('gv_fiv_qty')->nullable();
            $table->integer('gv_ten_qty')->nullable();
            $table->integer('gv_twe_qty')->nullable();
            $table->integer('gv_twf_qty')->nullable();

            $table->integer('gv_one_amt')->nullable();
            $table->integer('gv_fiv_amt')->nullable();
            $table->integer('gv_ten_amt')->nullable();
            $table->integer('gv_twe_amt')->nullable();
            $table->integer('gv_twf_amt')->nullable();

            $table->double('gv_inv_amt')->nullable();
            $table->double('gv_vat_amt')->nullable();
            $table->double('gv_inv_net_amt')->nullable();

            $table->string('gv_user_id')->nullable();
            $table->string('gv_user_name')->nullable();

            $table->string('gv_rec_status')->nullable();
            $table->string('gv_rec_date')->nullable();
            $table->string('gv_rec_by')->nullable();

            $table->string('gv_flex_01')->nullable();
            $table->string('gv_flex_02')->nullable();
            $table->string('gv_flex_03')->nullable();

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
        Schema::dropIfExists('giftsales');
    }
}
