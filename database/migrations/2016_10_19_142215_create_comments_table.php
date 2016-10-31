<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::dropIfExists('comment_post');
//        Schema::dropIfExists('comments');
//
//        Schema::create('comments', function (Blueprint $table)
//        {
//            $table->increments('id', true);
//            $table->integer('user_id')->unsigned();
//            $table->integer('post_id')->unsigned();
//            $table->integer('parent_id')->nullable()->default(0)->index();
//            $table->integer('vote')->nullable()->default(0)->index();
//            $table->integer('level')->nullable()->default(0)->index();
//            $table->string('user_ip')->nullable();
//            $table->text('content');
//            $table->timestamp('published_at')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::table('comments', function($table)
//        {
//            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
//        });
//
//        Schema::create('comment_post', function (Blueprint $table) {
//            $table->integer('comment_id')->unsigned()->index();
//            $table->integer('post_id')->unsigned()->index();
//            $table->timestamps();
//        });
//
//        Schema::table('comment_post', function($table)
//        {
//            $table->foreign('comment_id')->references('id')->on('comments')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('comment_post');
//        Schema::drop('comments');
    }
}
