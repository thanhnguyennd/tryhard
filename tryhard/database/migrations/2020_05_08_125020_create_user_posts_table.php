<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->longText('content')->nullable($value = true);
            $table->integer('type')->default(1);
            $table->integer('catalog')->default(1);
            $table->longText('iframe_syntax')->nullable($value = true);
            $table->string('image_thumb')->nullable($value = true);
            $table->longText('description')->nullable($value = true);
            $table->integer('is_publish')->default(0);
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
        Schema::dropIfExists('user_posts');
    }
}
