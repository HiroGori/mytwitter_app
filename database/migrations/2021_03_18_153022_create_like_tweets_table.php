<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_tweets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tweet_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('tweet_id')
                ->references('id')->on('tweets')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_tweets');
    }
}
