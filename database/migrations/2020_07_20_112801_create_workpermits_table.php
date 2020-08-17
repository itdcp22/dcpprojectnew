<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkpermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workpermits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wp_request_id')->nullable();
            $table->string('wp_comp_code')->nullable();
            $table->string('wp_comp_name')->nullable();
            $table->string('wp_applicant')->nullable();
            $table->string('wp_designation')->nullable();
            $table->string('wp_mobile')->nullable();
            $table->string('wp_email')->nullable();
            $table->string('wp_brand_name')->nullable();
            $table->string('wp_manager')->nullable();
            $table->string('wp_manager_contact')->nullable();
            $table->dateTime('wp_from_date')->nullable();
            $table->dateTime('wp_to_date')->nullable();
            $table->string('wp_from_time')->nullable();
            $table->string('wp_to_time')->nullable();
            $table->string('wp_category')->nullable();
            $table->string('wp_description')->nullable();
            $table->string('wp_cont_comp')->nullable();
            $table->string('wp_cont_person')->nullable();
            $table->string('wp_cont_mobile')->nullable();
            $table->string('wp_no_workers')->nullable();
            $table->string('wp_status')->nullable();

            $table->string('wp_remarks')->nullable();
            $table->string('wp_others')->nullable();
            $table->string('wp_created_uid')->nullable();
            $table->string('wp_created_name')->nullable();
            $table->dateTime('wp_created_date')->nullable();
            $table->string('wp_approved_uid')->nullable();
            $table->string('wp_approved_name')->nullable();
            $table->dateTime('wp_approved_date')->nullable();
            $table->dateTime('wp_approved_remark')->nullable();

            $table->string('wp_security_uid')->nullable();

            $table->string('wp_flex1')->nullable();
            $table->string('wp_flex2')->nullable();
            $table->string('wp_flex3')->nullable();
            $table->string('wp_flex4')->nullable();
            $table->string('wp_flex5')->nullable();
            $table->dateTime('wp_flex1_date')->nullable();
            $table->dateTime('wp_flex2_date')->nullable();
            $table->dateTime('wp_flex3_date')->nullable();
            $table->dateTime('wp_flex4_date')->nullable();
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
        Schema::dropIfExists('workpermits');
    }
}
