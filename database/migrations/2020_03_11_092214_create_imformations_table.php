<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imformations', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('class')->nullable();
            $table->string('class_english')->nullable();      
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->text('tag')->nullable();
            $table->text('tag_english')->nullable();
            $table->text('status')->nullable();
            $table->string('Image_file')->nullable();
            $table->string('Image_description_chin')->nullable();
            $table->string('Image_description_eng')->nullable();
            $table->string('title')->nullable();
            $table->string('title_english')->nullable();
            $table->string('second_title')->nullable();
            $table->string('second_title_english')->nullable();
            $table->string('website')->nullable();
            $table->string('website_english')->nullable();
            $table->string('person');
            $table->text('context')->nullable();
            $table->text('context_english')->nullable();
            $table->string('file')->nullable();
            $table->string('file_english')->nullable();
            $table->integer('time')->default('0');
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
        Schema::dropIfExists('imformations');
    }
}

