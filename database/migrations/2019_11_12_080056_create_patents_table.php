<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country')->nullable();
            $table->string('owner')->nullable();
            $table->string('publish_agency')->nullable();
            $table->string('year')->nullable();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->string('publish_schedule')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('website')->nullable();
            $table->string('language')->nullable();
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
        Schema::dropIfExists('patents');
    }
}
