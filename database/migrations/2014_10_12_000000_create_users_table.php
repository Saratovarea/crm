<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('floor')->nullable();
            $table->string('office')->nullable();
            $table->string('comment')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new \App\User();
        $user->name = 'Andrey';
        $user->email = 'andrey.cherkasov93@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user = new \App\User();
        $user->name = 'Nicolay';
        $user->email = 'ctomatolor@gmail.com';
        $user->password = bcrypt('ce5a6a6a62');
        $user->save();

        $user = new \App\User();
        $user->name = 'Ilya';
        $user->email = 'asd@asd.com';
        $user->password = bcrypt('123456');
        $user->save();

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
