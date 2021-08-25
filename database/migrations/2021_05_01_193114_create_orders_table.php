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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->string('order_number')->unique()->index();
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');

            $table->unsignedDouble('total_price');
            $table->unsignedDouble('discount');
            $table->unsignedDouble('sub_total');
            $table->unsignedDouble('tax');
            $table->unsignedDouble('grand_total');

            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->string('payment_code')->default(1);
            $table->string('online_pay_code')->nullable();

            $table->string('shipping_fullname');
            $table->unsignedInteger('shipping_province_id');
            $table->unsignedInteger('shipping_district_id');
            $table->string('shipping_street');
            $table->string('shipping_phone');
            $table->unsignedDouble('shipping_cost')->nullable();
            $table->text('notes')->nullable();

            $table->boolean('order_success')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('payment_code')->references('code')->on('payments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
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
