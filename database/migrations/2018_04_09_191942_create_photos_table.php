<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->unsignedInteger('subject_id');
            $table->string('subject_type', 50);
            $table->string('type', 50);
            $table->string('path');
            $table->string('thumbnail_filename');
            $table->string('original_name');
            $table->text('description');

            $table->unsignedInteger('created_by_user_id')->nullable();
            $table->unsignedInteger('modified_by_user_id')->nullable();

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
        Schema::dropIfExists('photos');
    }
}
