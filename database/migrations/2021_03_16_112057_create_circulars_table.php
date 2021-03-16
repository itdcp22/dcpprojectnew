<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circulars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ci_comp_code')->nullable();
            $table->string('ci_comp_name')->nullable();
            $table->string('ci_circular_no')->nullable();
            $table->date('ci_date')->nullable();
            $table->string('ci_subject')->nullable();
            $table->string('ci_document')->nullable();
            $table->string('ci_status')->nullable();
            $table->string('ci_email_status')->nullable();
            $table->string('ci_approved')->nullable();
            $table->string('ci_user_id')->nullable();
            $table->string('ci_user_name')->nullable();
            $table->string('ci_comments')->nullable();
            $table->string('ci_flex01')->nullable();
            $table->string('ci_flex02')->nullable();
            $table->string('ci_flex03')->nullable();
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
        Schema::dropIfExists('circulars');
    }
}
