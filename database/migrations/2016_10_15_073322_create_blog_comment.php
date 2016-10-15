<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('blog_id');
            $table->string('comment_name');
            $table->string('comment_body');
            $table->integer('like_count');
            $table->integer('dislike_count');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
