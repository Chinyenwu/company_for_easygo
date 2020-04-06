<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuslist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uniquename');
            $table->string('title');
            $table->string('url');
            $table->string('layer');
            $table->string('parent');
            $table->string('child');
            $table->string('function');
            $table->string('class');            
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
        Schema::dropIfExists('menus');
    }
}
