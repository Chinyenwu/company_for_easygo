<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('chapter')->nullable();
            $table->string('main_editer')->nullable();
            $table->string('publish_club')->nullable();
            $table->string('publish_position')->nullable();
            $table->string('all_editer')->nullable();
            $table->string('year')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('special_books');
    }
}
