<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objectives', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('obj_comp_code')->nullable();
            $table->string('obj_dept')->nullable();
            $table->longText('obj_desc')->nullable();
            $table->string('obj_created_uid')->nullable();
            $table->string('obj_created_name')->nullable();
            $table->string('obj_flex1')->nullable();
            $table->string('obj_flex2')->nullable();


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
        Schema::dropIfExists('objectives');
    }
}
