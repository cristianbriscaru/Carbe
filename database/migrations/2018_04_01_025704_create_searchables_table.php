<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postcode',7);
            $table->decimal('lat',10,7);
            $table->decimal('lng',10,7);
            $table->enum('distance',["undefined","1000","1","5","10","20","30","40","50","75","100","150","200","500"]) ;           
            $table->enum('min_price',["undefined","0","1","500","1000","2000","3000","4000","5000","6000","7000","8000","9000","10000",
            "12500","15000","17500","20000","25000","30000","35000","40000","45000","50000","55000","60000","75000","100000","250000","500000","1000000"]);
            $table->enum('max_price',["undefined","50000000","1","500","1000","2000","3000","4000","5000","6000","7000","8000","9000","10000",
            "12500","15000","17500","20000","25000","30000","35000","40000","45000","50000","55000","60000","75000","100000","250000","500000","1000000"]);
            $table->enum('state',['undefined','ANY','USED','NEW','NEARLYNEW']);
            $table->enum('age',['undefined','150','1','2','3','4','5','6','7','8','9','10','15','20']);
            $table->enum('service',['undefined','ANY','FULL','PART','NONE'])  ;
            $table->enum('mileage',["undefined","5000000","0","100","500","5000","10000","15000","20000","25000","30000","35000","40000","45000","50000","60000","70000","80000","90000","100000","125000","150000","200000",])  ;
            $table->enum('fuel_type',['undefined','ANY','PETROL','DIESEL','ELECTRIC','DIESEL/ELECTRIC','PETROL/ELECTRIC']);
            $table->enum('body',['undefined','ANY','SALOON','HATCHBACK','PICKUP','COUPE','SUV','ESTATE','CONVERTIBLE','MPV']);
            $table->enum('transmission',['undefined','ANY','MANUAL','AUTOMATIC','SEMIAUTOMATIC','CVT']);
            $table->enum('colour',['undefined','ANY','BEIGE','BLACK','BLUE','BRONZE','BROWN','BURGUNDY','GOLD','GREEN','GREY','INDIGO','MAGENTA','MAROON','MULTICOLOUR','NAVY','ORANGE','PINK','PURPLE','RED','SILVER','TURQUOISE','WHITE','YELLOW','OTHER']);
            $table->enum('doors',['undefined','2','3','4','5','10']);
            $table->enum('consumption',['undefined','25','50','75','100','1000']);
            $table->enum('seller_type',['undefined','any','private','trader']);
            $table->enum('engine_size',['undefined','20000','1000','1500','1700','2000','2500','3000']);
            $table->enum('sortby',['undefined','HIGHESTPRICE','LOWESTPRICE','MOSTRECENT','MAKE','MODEL','AGE','MILEAGE']);
            $table->char('model');
            $table->char('make');
            $table->morphs('searchable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('searchables');
    }
}
