<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filerooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class');
            $table->string('title');
            $table->string('filename');
            $table->string('file_path');
            $table->string('editer');
            $table->datetime('edit_time')->nullable();
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
        Schema::dropIfExists('filerooms');
    }
}
