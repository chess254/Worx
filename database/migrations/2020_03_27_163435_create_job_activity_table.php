<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_activity', function (Blueprint $table) {
            // $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('user_id')->primary();
            $table->unsignedInteger('job_id');
            $table->date('apply_date');
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
        Schema::dropIfExists('job_activity');
    }
}
