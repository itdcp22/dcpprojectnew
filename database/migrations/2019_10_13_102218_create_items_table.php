<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('td_tran_no')->nullable();
            $table->string('td_item_desc')->nullable();
            $table->Integer('td_qty')->nullable();
            $table->float('td_unit_price')->nullable();
            $table->float('td_unit_amt')->nullable();
            $table->date('td_bill_dt')->nullable();
            $table->date('td_supp_name')->nullable();
            $table->bigInteger('account_id')->unsigned()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
}
