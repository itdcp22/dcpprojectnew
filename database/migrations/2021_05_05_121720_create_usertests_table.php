<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_type', 50)->default('tenant');
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company')->nullable();
            $table->string('dept')->nullable();
            $table->string('status')->default('1');
            $table->string('last_seen')->nullable();
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
        Schema::dropIfExists('usertests');
    }
}
