<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('name_bg');
            $table->string('name_en');
            $table->unsignedBigInteger('town_id')->unsigned();
            $table->string('address_bg')->nullable();
            $table->string('address_en')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('web_adr')->nullable();
            $table->integer('stars');
            $table->integer('start_price');
            $table->text('price_long')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
