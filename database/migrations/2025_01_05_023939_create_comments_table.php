<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
        $table->string('name');
        $table->string('email');
        $table->text('message');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('comments');
}
};
