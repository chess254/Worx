<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InterviewSeekerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_seeker_profile', function (Blueprint $table) {
            // $table->id();
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('interview_id');
            $table->unsignedInteger('seeker_profile_id');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('status', 100)->nullable();


            $table->foreign('seeker_profile_id')->references('id')->on('seeker_profile');
            $table->foreign('interview_id')->references('id')->on('interviews');
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
        Schema::dropIfExists('interview_seeker_profile');
    }
}
