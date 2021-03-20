<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('phone')->unique()->nullable(false);
            $table->string('photo')->nullable(false);
            $table->date('birth_date')->nullable(true);
            $table->double('balance')->default(0.0);
            $table->string('password')->nullable(false);
            $table->timestamps();
            $table->boolean('is_admin')->default(false);
        

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
