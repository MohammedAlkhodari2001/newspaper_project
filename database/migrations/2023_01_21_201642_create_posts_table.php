<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for user
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key for category
            $table->foreignId('tag_id')->constrained('tags')->onDelete('set null')->nullable(); // Foreign key for tag (nullable, with set null)
            $table->string('title');
            $table->string('slug');
            $table->longText('shor_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('status');
            $table->string('slider_news')->nullable();
            $table->string('bracking_news')->nullable();
            $table->string('popular_news')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
