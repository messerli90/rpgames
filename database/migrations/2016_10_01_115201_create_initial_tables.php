<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
        });

        Schema::create('platforms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
        });

        Schema::create('languages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('title')->unique();
        });

        Schema::create('difficulties', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
        });

        Schema::create('challenges', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('views')->default(0);
            $table->integer('difficulty_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('game_id')->unsigned()->index();
            $table->integer('platform_id')->unsigned()->index();
            $table->integer('language_id')->unsigned()->index();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('reviewable_id')->unsigned()->index();
            $table->string('reviewable_type');
            $table->integer('value');
            $table->text('body');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('favoritable_id')->unsigned()->index();
            $table->string('favoritable_type');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('url');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('challenge_id')->unsigned()->index();
            $table->softDeletes();
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
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('videos');
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('challenges');
        Schema::dropIfExists('difficulties');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('platforms');
        Schema::dropIfExists('games');

        Schema::enableForeignKeyConstraints();
    }
}
