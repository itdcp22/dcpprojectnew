<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('obj_comp_code')->nullable();
            $table->longText('ojb_desc')->nullable();
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
        Schema::dropIfExists('objects');
    }
}
