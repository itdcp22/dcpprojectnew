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
            $table->string('info_obj_id')->nullable();
            $table->string('info_obj_des')->nullable();

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
