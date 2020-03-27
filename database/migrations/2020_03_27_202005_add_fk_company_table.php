<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->unsignedInteger('business_stream_id')->nullable()->index()->change();
            $table->foreign('business_stream_id')
        ->references('id')->on('business_stream')
        ->onDelete('cascade')->change();
        });

        Schema::table('company_image', function (Blueprint $table) {
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')
        ->references('id')->on('company')
        ->onDelete('cascade')->change();
        });

        Schema::table('experience_details', function (Blueprint $table) {
            // $table->unsignedInteger('company_id');
            $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->change();
        });

        Schema::table('job_activity', function (Blueprint $table) {
            $table->foreign('job_id')
        ->references('id')->on('jobs')
        ->onDelete('cascade')->change();
        });

        Schema::table('seeker_skill_set', function (Blueprint $table) {
            $table->foreign('skill_set_id')
        ->references('id')->on('skill_set')
        ->onDelete('cascade')->change();
        });

        

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            //
        });
    }
}
