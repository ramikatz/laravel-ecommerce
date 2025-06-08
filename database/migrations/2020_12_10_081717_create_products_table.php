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
            $table->string('product_title');
            $table->string('slug');
            $table->string('product_sub')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_weight')->nullable();

            $table->string('product_description')->nullable();
            $table->string('content')->nullable();
            $table->string('description')->nullable();
            $table->string('sub_description')->nullable();

            $table->string('quantity')->nullable();
            $table->string('availability')->nullable();

            $table->float('regular_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->float('purchase_price')->nullable();
            $table->string('discount')->nullable();

            $table->string('image')->nullable();
            $table->string('hover_image')->nullable();
            $table->string('video')->nullable();

            $table->string('keywords')->nullable();
            $table->longText('meta')->nullable();

            $table->enum('status', ['Pending', 'Review', 'Deleted', 'published'])->default('published');
            $table->string('rating')->nullable();

            $table->softDeletes();
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
