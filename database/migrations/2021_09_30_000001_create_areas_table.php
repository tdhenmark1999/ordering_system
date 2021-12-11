<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('areas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->default("0");
            $table->string('area_code')->nullable();
            $table->string('desc')->nullable();
            $table->string('floor')->nullable();
            $table->string('row')->nullable();
            $table->string('col')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
