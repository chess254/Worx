<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('applications', function (Blueprint $table) {
        //     $table->unsignedInteger('id')->change();
        // });
        Schema::create('interviews', function (Blueprint $table) {
            // $table->id();
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('application_id');
            // $table->integer('seeker_profile_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('application_id')->references('id')->on('applications');

            

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
        Schema::dropIfExists('interviews');
    }
}
