<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('postcode',7);
            $table->string('town');
            $table->string('county');
            $table->decimal('lat',10,7);
            $table->decimal('lng',10,7);
            $table->string('telephone',15)->unique();
            $table->enum('sellertype', ['private', 'trader']);
            $table->string('business')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('sellers');
    }
}
