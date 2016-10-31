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
            $table->integer('menu_type_id')->unsigned();
            $table->integer('extensions_id')->default(0)->unsigned();
            $table->integer('parent_id')->default(1);
            $table->integer('level')->default(0);
            $table->string('title');
            $table->string('alias');
            $table->boolean('published')->default(1);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('extensions_id')->references('id')->on('extensions')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('menu_type_id')->references('id')->on('menu_type')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('menu_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_type');
            $table->string('title');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('menu_type');
    }
}
