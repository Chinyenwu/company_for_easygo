<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('speech_name');
            $table->string('meeting_name')->nullable();
            $table->string('position')->nullable();
            $table->string('agency')->nullable();
            $table->string('all_editer')->nullable();
            $table->string('year')->nullable();
            $table->string('type')->nullable();
            $table->string('level')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('publish_year')->nullable();
            $table->string('editer_number')->nullable();
            $table->string('editer_type')->nullable();
            $table->string('ISSN')->nullable();
            $table->string('ISI_Number')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('website')->nullable();
            $table->string('language')->nullable();
            $table->string('project_name')->nullable();
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
        Schema::dropIfExists('seminars');
    }
}
