<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('honors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('agency')->nullable();
            $table->string('country')->nullable();
            $table->string('year')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('honors');
    }
}
