<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->increments();
            $table->integer('user_id');
            $table->string('title');
            $table->longText('content')->nullable($value = true);
            $table->integer('type')->default(1);
            $table->integer('catalog')->default(1);
            $table->longText('iframe_syntax')->nullable($value = true);
            $table->string('image_thumb')->nullable($value = true);
            $table->longText('description')->nullable($value = true);
            $table->integer('is_publish')->default(0);
            $table->integer('priority')->default(-1);
            $table->integer('rank')->default(0);
            $table->integer('view_count')->default(0);
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
}
