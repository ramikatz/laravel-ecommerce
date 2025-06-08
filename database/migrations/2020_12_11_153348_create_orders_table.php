<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['Order Pending', 'Order Confirmed', 'Picked by delivery team', 'On the way', 'Ready for pickup
'])->default('Order Pending');
            $table->string('deliveryperson_id')->nullable();
            $table->float('grand_total');
            $table->integer('item_count');

            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['cash_on_delivery', 'paypal', 'stripe', 'card'])->default('cash_on_delivery');
            $table->string('notes')->nullable();

            $table->string('coupon_code')->nullable();
            $table->string('district')->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
