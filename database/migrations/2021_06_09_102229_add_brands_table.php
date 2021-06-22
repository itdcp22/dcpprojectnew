<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('bm_unit_no')->nullable();
            $table->string('bm_size')->nullable();
            $table->string('bm_type')->nullable();
            $table->string('bm_vat')->nullable();

            $table->string('bm_fina_email')->nullable();
            $table->string('bm_oper_email')->nullable();

            $table->date('bm_open_date')->nullable(); //date of opening

            $table->string('bm_eb')->nullable();
            $table->string('bm_water')->nullable();
            $table->string('bm_cwater')->nullable(); //chill water
            $table->string('bm_sewage')->nullable();
            $table->string('bm_service')->nullable();

            $table->string('bm_eb_rate')->nullable();
            $table->string('bm_water_rate')->nullable();
            $table->string('bm_cwater_rate')->nullable();
            $table->string('bm_sewage_rate')->nullable();

            $table->string('bm_eb_meter1_no')->nullable(); //meter number
            $table->string('bm_eb_meter2_no')->nullable();
            $table->string('bm_water_meter_no')->nullable();
            $table->string('bm_cwater_meter_no')->nullable();
            $table->string('bm_sewage_meter_no')->nullable();

            $table->string('bm_eb_ob')->nullable(); //opening balance
            $table->string('bm_water_ob')->nullable();
            $table->string('bm_cwater_ob')->nullable();
            $table->string('bm_sewage_ob')->nullable();

            $table->string('bm_eb_bill_type')->nullable(); //Bill type - Reading or Flat Or Area
            $table->string('bm_water_bill_type')->nullable();
            $table->string('bm_cwater_bill_type')->nullable();
            $table->string('bm_sewage_bill_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            //
        });
    }
}
