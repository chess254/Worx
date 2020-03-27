<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerSkillSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_skill_set', function (Blueprint $table) {
            // $table->unsignedInteger('id')->unsigned()->autoIncrement();
            $table->unsignedInteger('user_id')->primary(); 	
            $table->unsignedInteger('skill_set_id'); 	
            $table->integer('skill_level'); 
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
        Schema::dropIfExists('seeker_skill_set');
    }
}
