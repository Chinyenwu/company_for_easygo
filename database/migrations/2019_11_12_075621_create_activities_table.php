<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class');
            $table->string('signup_start_date');
            $table->string('signup_end_date');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('name');
            $table->string('context')->nullable();
            $table->string('position')->nullable();
            $table->string('remark')->nullable();
            $table->string('website')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
