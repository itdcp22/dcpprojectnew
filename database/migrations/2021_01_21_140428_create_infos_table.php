<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('info_comp_code')->nullable();
            $table->date('info_date')->nullable();
            $table->string('info_divi')->nullable();
            $table->string('info_dept')->nullable();
            $table->string('info_owner')->nullable();
            $table->string('info_staff')->nullable();
            $table->decimal('info_obj_id')->nullable();
            $table->string('info_obj_des')->nullable();

            $table->string('kpi_code')->nullable();
            $table->longText('kpi_title')->nullable();
            $table->longText('kpi_defi')->nullable();
            $table->longText('kpi_goal')->nullable();
            $table->string('kpi_data_code')->nullable();
            $table->string('kpi_data_desc')->nullable();
            $table->string('kpi_exist')->nullable();
            $table->string('kpi_level')->nullable();
            $table->string('kpi_tarperc')->nullable();
            $table->string('kpi_tar_fig')->nullable();

            $table->string('kpi_owner')->nullable();
            $table->string('kpi_comments')->nullable();
            $table->string('kpi_created_uid')->nullable();
            $table->string('kpi_created_name')->nullable();
            $table->string('kpi_status')->nullable();

            $table->decimal('kpi_per_gf')->nullable();
            $table->decimal('kpi_per_yf')->nullable();
            $table->decimal('kpi_per_rf')->nullable();
            $table->decimal('kpi_per_gt')->nullable();
            $table->decimal('kpi_per_yt')->nullable();
            $table->decimal('kpi_per_rt')->nullable();


            $table->decimal('kpi_val_gf')->nullable();
            $table->decimal('kpi_val_yf')->nullable();
            $table->decimal('kpi_val_rf')->nullable();
            $table->decimal('kpi_val_gt')->nullable();
            $table->decimal('kpi_val_yt')->nullable();
            $table->decimal('kpi_val_rt')->nullable();


            $table->decimal('kpi_range_gf')->nullable();
            $table->decimal('kpi_range_yf')->nullable();
            $table->decimal('kpi_range_rf')->nullable();
            $table->decimal('kpi_range_gt')->nullable();
            $table->decimal('kpi_range_yt')->nullable();
            $table->decimal('kpi_range_rt')->nullable();


            $table->decimal('kpi_jan21')->nullable();
            $table->decimal('kpi_feb21')->nullable();
            $table->decimal('kpi_mar21')->nullable();
            $table->decimal('kpi_apr21')->nullable();
            $table->decimal('kpi_may21')->nullable();
            $table->decimal('kpi_jun21')->nullable();
            $table->decimal('kpi_jul21')->nullable();
            $table->decimal('kpi_aug21')->nullable();
            $table->decimal('kpi_sep21')->nullable();
            $table->decimal('kpi_oct21')->nullable();
            $table->decimal('kpi_nov21')->nullable();
            $table->decimal('kpi_dec21')->nullable();


            $table->string('kpi_jan21_result')->nullable();
            $table->string('kpi_feb21_result')->nullable();
            $table->string('kpi_mar21_result')->nullable();
            $table->string('kpi_apr21_result')->nullable();
            $table->string('kpi_may21_result')->nullable();
            $table->string('kpi_jun21_result')->nullable();
            $table->string('kpi_jul21_result')->nullable();
            $table->string('kpi_aug21_result')->nullable();
            $table->string('kpi_sep21_result')->nullable();
            $table->string('kpi_oct21_result')->nullable();
            $table->string('kpi_nov21_result')->nullable();
            $table->string('kpi_dec21_result')->nullable();


            //daily
            $table->decimal('kpi_date')->nullable();
            $table->string('kpi_date_result')->nullable();

            //quaterly
            $table->decimal('kpi_q121')->nullable();
            $table->decimal('kpi_q221')->nullable();
            $table->decimal('kpi_q321')->nullable();
            $table->decimal('kpi_q421')->nullable();


            $table->string('kpi_q121_result')->nullable();
            $table->string('kpi_q221_result')->nullable();
            $table->string('kpi_q321_result')->nullable();
            $table->string('kpi_q421_result')->nullable();

            //haly yearly
            $table->decimal('kpi_hy121')->nullable();
            $table->decimal('kpi_hy221')->nullable();

            $table->string('kpi_hy121_result')->nullable();
            $table->string('kpi_hy221_result')->nullable();

            //Yeary
            $table->decimal('kpi_2021')->nullable();
            $table->string('kpi_2021_result')->nullable();



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
        Schema::dropIfExists('infos');
    }
}
