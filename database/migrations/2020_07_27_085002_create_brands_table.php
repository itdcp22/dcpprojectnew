<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bm_code')->nullable();
            $table->string('bm_name')->nullable();
            $table->string('bm_location')->nullable();
            $table->string('bm_contact')->nullable();
            $table->string('bm_designation')->nullable();
            $table->string('bm_mobile')->nullable();
            $table->string('bm_tel')->nullable();
            $table->string('bm_email')->nullable();
            $table->string('bm_permited')->nullable();
            $table->date('bm_expiry_date')->nullable();
            $table->string('bm_area')->nullable();
            $table->string('bm_status')->nullable();
            $table->integer('bm_tm_id')->nullable();
            $table->string('bm_tm_name')->nullable();
            $table->string('bm_user')->nullable();
            $table->string('bm_ref_no')->nullable();
            $table->string('bm_cr_no')->nullable();
            $table->string('bm_created_uid')->nullable();
            $table->string('bm_flex1')->nullable();
            $table->string('bm_flex2')->nullable();
            $table->string('bm_flex3')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
