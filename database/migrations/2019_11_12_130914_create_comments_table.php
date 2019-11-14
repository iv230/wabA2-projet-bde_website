<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('autor');
            $table->string('comment_content');
            $table->dateTime('comment_date');
            $table->bigInteger('id_event')->unsigned();
            $table->timestamps();
        });

        Schema::table('comments', function($table){
            $table->foreign('id_event')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_event']);
        Schema::dropIfExists('comments');
    }
}
