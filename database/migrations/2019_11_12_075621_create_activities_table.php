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
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('agency')->nullable();
            $table->string('publish_agency')->nullable();
            $table->string('brief')->nullable();
            $table->string('year')->nullable();
            $table->string('type')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->string('website')->nullable();
            $table->string('position')->nullable();
            $table->string('remark')->nullable();
            $table->string('person')->nullable();
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
