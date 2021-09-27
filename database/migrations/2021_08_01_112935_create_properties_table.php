<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_id')->unique();
            $table->bigInteger('agent_id');
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('style');
            $table->string('state');
            $table->string('city');
            $table->unsignedInteger('bedrooms');
            $table->unsignedInteger('bathrooms');
            $table->boolean('garage')->default(false);
            $table->unsignedInteger('price');
            $table->unsignedInteger('area');
            $table->string('area_unit');
            $table->string('address');
            $table->string('video_url');
            $table->string('featured_image');
            $table->string('home_image');
            $table->bigInteger('views')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_sold')->default(false);
            $table->boolean('is_pending')->default(false);
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('properties');
    }
}
