<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('humidity');
            $table->float('humidity_sensor');
            $table->integer('clouds');
            $table->float('wind_speed');
            $table->string('weather_main');
            $table->text('weather_description');
            $table->string('weather_icon');
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
        Schema::dropIfExists('weathers');
    }
}
