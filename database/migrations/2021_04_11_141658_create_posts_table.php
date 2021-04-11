<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_post_id')->nullable()->index('fk_posts_posts1');
            $table->text('content');
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->index('fk_posts_users');

            $table->foreign('parent_post_id', 'fk_posts_posts1')->references('id')->on('posts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_posts_users')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
