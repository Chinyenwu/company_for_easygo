<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('advertising')->default('no');
            $table->string('imformation')->default('no');
            $table->string('fileroom')->default('no');
            $table->string('photealbum')->default('no');
            $table->string('page')->default('no');
            $table->string('networklink')->default('no');
            $table->string('auth')->default('no');
            $table->string('register')->default('no');
            $table->string('positions')->default('no');
            $table->string('permission')->default('no');
            $table->string('setup')->default('no');
            $table->string('menus')->default('no');
            $table->string('website_information')->default('no');
            $table->string('keyword')->default('no');
            $table->string('setupchange')->default('no');
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
        Schema::dropIfExists('permissions');
    }
}
