<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');//
            $table->double('debit')->default(0.0);//
            $table->double('credit')->default(0.0);//
            $table->bigInteger('category_id')->unsigned();//
            $table->bigInteger('user_id')->unsigned();//
            $table->foreign('user_id')->references('id')->on('users') -> onDelete('cascade');//
            $table->foreign('category_id')->references('id')->on('categories') -> onDelete('cascade');//
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
        Schema::dropIfExists('transactions');
    }
}
