<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *        $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');

     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key for 'users' table
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  // Foreign key for 'categories' table
            $table->foreignId('tag_id')->nullable()->constrained('tags')->onDelete('cascade');  // Foreign key for 'tags' table
            $table->string('title');
            $table->string('slug');
            $table->longText('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('status');
            $table->string('slider_news')->nullable();
            $table->string('bracking_news')->nullable();
            $table->string('popular_news')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();  // created_at & updated_at timestamps
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
