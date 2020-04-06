<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setupchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('encryption')->nullable();
            $table->string('logouttime')->nullable();
            $table->string('loginfail')->nullable();
            $table->string('uploadtype')->nullable();
            $table->string('uploadsize')->nullable();
            $table->string('picturetype')->nullable();
            $table->string('picturesize')->nullable();
            $table->string('headpastesize')->nullable();
            $table->string('headpastewidth')->nullable();
            $table->string('headpasteheight')->nullable();
            $table->string('photeuploadnumber')->nullable();
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
        Schema::dropIfExists('setupchanges');
    }
}
