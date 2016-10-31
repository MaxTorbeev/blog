<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('alias');
            $table->text('intro_text')->nullable();
            $table->text('full_text');
            $table->boolean('published')->default(1);
            $table->integer('cat_id')->default(1);
            $table->integer('created_user_id');
            $table->integer('modify_user_id')->nullable();

            $table->string('metakey')->nullable();
            $table->string('metadesc')->nullable();
            $table->string('metadata')->nullable();

            $table->integer('hits')->default(0);
            $table->timestamp('published_at')->nullable();
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