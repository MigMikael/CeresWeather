<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        $sql = 'ALTER TABLE `plants` ADD `original_image` MEDIUMBLOB';
        DB::connection()->getPdo()->exec($sql);

        $sql = 'ALTER TABLE `plants` ADD `process_image` MEDIUMBLOB';
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
