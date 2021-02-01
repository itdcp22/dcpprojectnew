<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('ini_obj_id')->nullable();
            $table->longText('ini_obj_desc')->nullable();

            $table->integer('ini_kpi_id')->nullable();
            $table->longText('ini_kpi_title')->nullable();


            $table->string('ini_code')->nullable();
            $table->string('ini_title')->nullable();
            $table->longText('ini_desc')->nullable();
            $table->string('ini_scope')->nullable();
            $table->string('ini_msr')->nullable();
            $table->string('ini_cur_result')->nullable();
            $table->string('ini_owner')->nullable();
            $table->string('ini_budget')->nullable();
            $table->string('ini_priority')->nullable();
            $table->date('ini_start_date')->nullable();
            $table->date('ini_end_date')->nullable();
            $table->longText('ini_maj_acti')->nullable();
            $table->string('ini_risk')->nullable();
            $table->string('ini_comments')->nullable();
            $table->integer('ini_created_uid')->nullable();
            $table->string('ini_created_name')->nullable();
            $table->string('ini_comp_code')->nullable();
            $table->string('ini_dept')->nullable();
            $table->string('ini_status')->nullable();
            $table->string('ini_flex1')->nullable();
            $table->string('ini_flex2')->nullable();
            $table->string('ini_flex3')->nullable();


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
        Schema::dropIfExists('initiatives');
    }
}
