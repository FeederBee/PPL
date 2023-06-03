<?php 

use Illuminate\Support\Facades\Schema; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Database\Migrations\Migration; 

class CreateProductsTable extends Migration { 

/** 
* Run the migrations. 
* 
* @return void */ 

public function up() 
{ 
    Schema::create('products', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('nama',50);
            $table->string('image')->nullable();
            $table->string('harga',50);
            $table->integer('stok')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
}