<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Statuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // INSERT CATEGORIES
        DB::table('statuses')->insert(array('name' => "Статус 1"));
        DB::table('statuses')->insert(array('name' => "Статус 2"));
        DB::table('statuses')->insert(array('name' => "Статус 3"));
        DB::table('statuses')->insert(array('name' => "Статус 4"));
        DB::table('statuses')->insert(array('name' => "Статус 5"));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
