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
            $table->string('slug');
            $table->text('preview_photo_id')->nullable();

            $table->text('intro_text')->nullable();
            $table->text('full_text');

            $table->text('attribs')->nullable();

            $table->boolean('published')->default(1);
            $table->integer('parent_id')->default(1);
            $table->unsignedInteger('created_user_id');
            $table->unsignedInteger('modify_user_id')->nullable();

            $table->integer('priority')->default(500);

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
