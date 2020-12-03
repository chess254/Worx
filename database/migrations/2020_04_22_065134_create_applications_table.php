<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger('applicant_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id');
            // $table->integer('views')->default(0)->change();
            $table->integer('views')->default(0);
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('employer_id')->references('id')->on('users');
            $table->foreign('applicant_id')->references('id')->on('seeker_profile');
            $table->foreign('company_id')->references('id')->on('company');
            $table->string('status', 50)->nullable();
            $table->boolean('shortlisted')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
