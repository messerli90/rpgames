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

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('commentable_id')->unsigned()->index();
            $table->string('commentable_type');
            $table->text('body');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('rateable_id')->unsigned()->index();
            $table->string('rateable_type');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::drop('favorites');
        Schema::drop('ratings');
        Schema::drop('comments');
        Schema::drop('challenges');
        Schema::drop('difficulties');
        Schema::drop('languages');
        Schema::drop('platforms');
        Schema::drop('games');

        Schema::enableForeignKeyConstraints();
    }
}
