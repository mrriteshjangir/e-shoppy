<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->Integer('product_id')->nullable();
            $table->String('item_sku')->unique();
            $table->Integer('item_mrp')->nullable();
            $table->Integer('item_price')->nullable();
            $table->Integer('item_qty')->nullable();
            $table->Integer('color_id')->nullable();
            $table->Integer('size_id')->nullable();
            $table->String('item_details')->nullable();
            $table->String('item_keywords')->nullable();
            $table->String('item_tech_speci')->nullable();
            $table->String('item_uses')->nullable();
            $table->String('item_service')->nullable();
            $table->String('item_at')->default('normal');
            $table->Integer('item_status')->default(1);
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
        Schema::dropIfExists('items');
    }
}
