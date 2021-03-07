<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaserequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaserequests', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('pr_req_comp_code')->nullable();
            $table->string('pr_req_comp_name')->nullable();

            $table->string('pr_req_no')->nullable();
            $table->string('pr_req_date')->nullable();
            $table->string('pr_req_uid')->nullable();
            $table->string('pr_req_name')->nullable();
            $table->string('pr_req_desi')->nullable();
            $table->string('pr_req_dept')->nullable();

            $table->string('pr_req_mobile')->nullable();
            $table->string('pr_req_email')->nullable();

            $table->dateTime('pr_req_del_date')->nullable();

            $table->longText('pr_req_remarks')->nullable();
            $table->string('pr_req_status')->nullable();

            $table->string('pr_req_appr_uid')->nullable();
            $table->string('pr_req_appr_uname')->nullable();
            $table->dateTime('pr_req_appr_date')->nullable();

            $table->string('pr_flex1')->nullable();
            $table->string('pr_flex2')->nullable();
            $table->string('pr_flex3')->nullable();




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
        Schema::dropIfExists('purchaserequests');
    }
}
