<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_id')->unique()->nullable();
            $table->unsignedBigInteger('product_id')->unique()->nullable();
            $table->unsignedDouble('value');
            $table->timestamp('start');
            $table->timestamp('end');
            $table->enum('unit', ['percent', 'currency'])->default('percent');
            $table->boolean('valid')->default(1);
            $table->timestamps();

            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_discounts');
    }
}
