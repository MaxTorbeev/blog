<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('menu_type_id')->unsigned()->nullable()->default(null);
            $table->integer('parent_id')->nullable()->default(null);
            $table->integer('level')->default(0);
            $table->string('url')->nullable()->default(null)->comment = "Url to";
            $table->string('route_name')->nullable()->default(null)->comment = "Laravel named routes";

            $table->integer('priority')->default(500);
            $table->text('params')->nullable();

            $table->boolean('published')->default(1);
            $table->string('image')->nullable();

            $table->unsignedInteger('created_user_id');
            $table->unsignedInteger('modify_user_id')->nullable();

            $table->timestamps();
        });

        Schema::create('menu_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug', 100)->unique();
            $table->string('description')->nullable();

            $table->text('attribs')->nullable();

            $table->unsignedInteger('created_user_id');
            $table->unsignedInteger('modify_user_id')->nullable();

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
        Schema::dropIfExists('menu');
        Schema::dropIfExists('menu_types');
    }
}
