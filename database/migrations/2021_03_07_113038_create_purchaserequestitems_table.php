<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaserequestitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaserequestitems', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('pri_item')->nullable();
            $table->string('pri_qty')->nullable();
            $table->string('pri_reason')->nullable();

            $table->string('pri_flex1')->nullable();
            $table->string('pri_flex2')->nullable();

            $table->bigInteger('purchaserequest_id')->unsigned()->nullable();
            $table->foreign('purchaserequest_id')->references('id')->on('purchaserequests')->onDelete('cascade');


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
        Schema::dropIfExists('purchaserequestitems');
    }
}
