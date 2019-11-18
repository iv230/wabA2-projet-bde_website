<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_event')->unsigned();
            $table->bigInteger('id_image')->unsigned();
            $table->timestamps();
        });

        Schema::table('event_images', function (Blueprint $table) {
            $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('id_image')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_event', 'id_image']);
        Schema::dropIfExists('event_images');
    }
}
