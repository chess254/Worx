<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('seeker_profile_id');
            $table->text('certificate')->nullable();
            $table->text('institute')->nullable();
            $table->date('starting_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('grade', 50)->nullable();
            $table->text('course')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('education_details');
    }
}
