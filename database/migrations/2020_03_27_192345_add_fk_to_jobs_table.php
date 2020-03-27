<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
          
            
        $table->foreign('posted_by_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->change();

        $table->foreign('type_id')
        ->references('id')->on('job_type')
        ->onDelete('cascade')->change();

        $table->foreign('company_id')
        ->references('id')->on('company')
        ->onDelete('cascade')->change();

        $table->foreign('location_id')
        ->references('id')->on('job_location')
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
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
