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
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('view')->default(0);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('flag')->nullable();
            $table->text('content');
            $table->text('description');
            $table->unsignedDouble('price');
            $table->unsignedInteger('quantity');
            $table->jsonb('seo_image');
            $table->string('seo_title');
            $table->text('seo_description');
            $table->string('seo_keyword');
            $table->boolean('is_featured')->default(0);
            $table->unsignedInteger('order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
