<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug', 100);
            $table->unsignedInteger('parent_id')->nullable()->default(null);


            $table->text('description')->nullable()->default(null);
            $table->string('note')->nullable()->default(null);

            $table->integer('priority')->default(500);

            $table->string('metakey')->nullable();
            $table->string('metadesc')->nullable();
            $table->string('metadata')->nullable();

            $table->text('attribs')->nullable();

            $table->boolean('published')->default(1);

            $table->unsignedInteger('created_user_id');
            $table->unsignedInteger('modify_user_id')->nullable();

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
        Schema::dropIfExists('posts_categories');
    }
}
