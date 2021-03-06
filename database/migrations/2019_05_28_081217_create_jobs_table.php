<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::disableforeignKeyConstraints();
        Schema::create('jobs', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('posted_by')->unsigned();
            $table->foreign('posted_by')->references('id')->on('users');
            $table->string('title');
            $table->string('job_type');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('jobs');
    }
}
