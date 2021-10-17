<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String('product_name');
            $table->String('product_slug');
            $table->String('product_brand')->default('data');
            $table->Integer('category_id')->default(0);
            $table->String('product_model')->default('data');
            $table->String('product_details');
            $table->String('product_keywords')->default('data');
            $table->String('product_tech_speci')->default('data');
            $table->String('product_uses')->default('data');
            $table->String('product_warranty')->default('data');
            $table->Integer('product_status')->default(1);
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
