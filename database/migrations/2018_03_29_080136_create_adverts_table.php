<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->char('vrm',7);
            $table->integer('price');
            $table->mediumInteger('mileage');
            $table->enum('state',['USED','NEW','NEARLYNEW']);
            $table->string('variant',255);
            $table->enum('body',['SALOON','HATCHBACK','PICKUP','COUPE','SUV','ESTATE','CONVERTIBLE','MPV','OTHER']);
            $table->enum('transmission',['MANUAL','AUTOMATIC','SEMIAUTOMATIC','CVT','OTHER']);
            $table->enum('fuel_type',['PETROL','DIESEL','ELECTRIC','DIESEL/ELECTRIC','PETROL/ELECTRIC','OTHER']);
            $table->enum('colour',['BEIGE','BLACK','BLUE','BRONZE','BROWN','BURGUNDY','GOLD','GREEN','GREY','INDIGO','MAGENTA','MAROON','MULTICOLOUR','NAVY','ORANGE','PINK','PURPLE','RED','SILVER','TURQUOISE','WHITE','YELLOW','OTHER']);
            $table->enum('doors',['2','3','4','5']);
            $table->tinyInteger('seats');
            $table->year('registration_year');
            $table->smallInteger('engine_size');
            $table->smallInteger('emissions');
            $table->smallInteger('power');
            $table->decimal('urban_consumption',5,2);
            $table->decimal('combined_consumption',5,2);
            $table->decimal('motorway_consumption',5,2);
            $table->text('description');
            $table->enum('service',['FULL','PART','NONE']);
            $table->tinyInteger('owners');
            $table->smallInteger('tax');
            $table->enum('euro',['0','1','2','3','4','5','6']);
            $table->json('mot')->nullable();            
            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade'); 
            $table->unsignedInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('restrict');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
