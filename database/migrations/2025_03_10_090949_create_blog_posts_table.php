<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('category'); // Must be from predefined categories
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // Foreign key to users
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
