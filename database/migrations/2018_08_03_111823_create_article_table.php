<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author');
            $table->string('title');
            $table->text('content');
            $table->string('excerpt');
            $table->string('link');
            $table->integer('cover_id');
            $table->integer('temp_id');
            $table->integer('comment_count');
            $table->integer('category_id');
            $table->tinyInteger('weight');
            $table->tinyInteger('is_top');
            $table->tinyInteger('comment_status');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('article');
    }
}
