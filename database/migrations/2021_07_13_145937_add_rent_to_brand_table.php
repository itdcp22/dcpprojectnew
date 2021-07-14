<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRentToBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {

            $table->string('bm_rent')->nullable();
            $table->double('bm_base_rent')->nullable();
            $table->double('bm_fixed_cwater')->nullable();
            $table->double('bm_fixed_service')->nullable();
            $table->double('bm_fixed_marketing')->nullable();
            $table->double('bm_fixed_others')->nullable();
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
