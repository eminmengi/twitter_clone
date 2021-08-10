<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retweets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
             $table->foreignId('tweet_id');
            $table->foreign('tweet_id')->references('id')->on('tweets');

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
        Schema::dropIfExists('retweets');
    }
}
