<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->string('meta_title');
            $table->string('slug');
            $table->string('summary');
            $table->bigInteger('views');
            $table->boolean('published');
            $table->boolean('is_archived');
            $table->text('content');
            $table->string('banner_image');
            $table->string('recent_image');
            $table->string('small_image');
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
        Schema::dropIfExists('blogs');
    }
}
