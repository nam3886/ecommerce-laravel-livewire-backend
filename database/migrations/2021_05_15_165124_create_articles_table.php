<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('slug')->unique()->index();
            $table->string('title');
            $table->text('thumbnail');
            $table->text('description');
            $table->text('content');
            $table->enum('frontend_type', ['image', 'slider', 'video', 'audio'])->default('image');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
