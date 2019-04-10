<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        // INSERT CATEGORIES
        DB::table('categories')->insert(array('name' => "Категория 1"));
        DB::table('categories')->insert(array('name' => "Категория 2"));
        DB::table('categories')->insert(array('name' => "Категория 3"));
        DB::table('categories')->insert(array('name' => "Категория 4"));
        DB::table('categories')->insert(array('name' => "Категория 5"));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
