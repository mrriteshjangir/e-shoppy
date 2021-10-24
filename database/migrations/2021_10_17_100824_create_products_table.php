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
            $table->String('product_image');
            $table->Integer('brand_id');
            $table->Integer('category_id');
            $table->String('product_model');
            $table->String('product_details');
            $table->String('product_keywords')->nullable();
            $table->String('product_tech_speci')->nullable();
            $table->String('product_uses')->nullable();
            $table->String('product_warranty')->nullable();
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
