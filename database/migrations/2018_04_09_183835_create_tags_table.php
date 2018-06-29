<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->unsignedInteger('user_id');

            $table->string('metakey')->nullable();
            $table->string('metadesc')->nullable();
            $table->string('metadata')->nullable();

            $table->timestamps();
        });

        Schema::create('content_tag', function (Blueprint $table) {
            $table->unsignedInteger('content_id');

            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('tag_id');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::drop('content_tag');
        Schema::drop('tags');
    }
}
