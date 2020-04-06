<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('speech_name');
            $table->string('journal_name')->nullable();
            $table->string('all_editer')->nullable();
            $table->string('year')->nullable();
            $table->string('level')->nullable();
            $table->string('date')->nullable();
            $table->string('book_number')->nullable();
            $table->string('journal_number')->nullable();
            $table->string('page')->nullable();
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
        Schema::dropIfExists('journals');
    }
}
