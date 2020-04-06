<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('password');
          $table->datetime('created_at')->nullable();
          $table->datetime('updated_at')->nullable();
          $table->string('permission');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('email');
          $table->string('staff_number');
          $table->string('fax')->nullable();
          $table->string('contact_phone')->nullable();
          $table->string('cell_phone')->nullable();
          $table->string('gender')->nullable();
          $table->datetime('birthday')->nullable();
          $table->string('contact_address')->nullable();
          $table->string('class');
          $table->string('position');  
            //$table->rememberToken();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
