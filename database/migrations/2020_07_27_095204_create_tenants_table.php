<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tm_code')->nullable();
            $table->string('tm_name')->nullable();
            $table->string('tm_contact')->nullable();
            $table->string('tm_designation')->nullable();
            $table->string('tm_mobile')->nullable();
            $table->string('tm_email')->nullable();
            $table->string('tm_tel')->nullable();
            $table->string('tm_address')->nullable();
            $table->string('tm_status')->nullable();
            $table->string('tm_comments')->nullable();
            $table->string('tm_created_uid')->nullable();
            $table->string('tm_flex1')->nullable();
            $table->string('tm_flex2')->nullable();
            $table->string('tm_flex3')->nullable();
            $table->string('tm_flex4')->nullable();
            $table->string('tm_flex5')->nullable();

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
        Schema::dropIfExists('tenants');
    }
}
