<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitySignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_signups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity_name');
            $table->string('name');
            $table->string('contact_phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('PID')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('angency')->nullable();
            $table->string('work')->nullable();
            $table->string('address')->nullable();
            $table->string('mergency_phone')->nullable();
            $table->string('mergency_contact')->nullable();
            $table->string('food')->nullable();
            $table->string('remark')->nullable();            
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
        Schema::dropIfExists('activity_signups');
    }
}
