<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->string('job')->nullable();
            $table->string('join_people')->nullable();
            $table->string('mechanism')->nullable();
            $table->string('year')->nullable();
            $table->string('type')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('website')->nullable();
            $table->string('remark')->nullable();
            $table->string('person');
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
        Schema::dropIfExists('projects');
    }
}
