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
            $table->bigIncrements('uid');
            $table->string('uname');
            $table->string('phone');
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('fid');
            $table->string('fname');
            $table->decimal('price',5,2);

            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('ordid');
            $table->string('uname');
            $table->string('fname');
            $table->integer('quantity');
            $table->decimal('price', 5, 2);
            $table->decimal('amount', 5, 2);
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
        Schema::dropIfExists('users');
    }
}
