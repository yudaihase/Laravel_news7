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
        if (!Schema::hasTable('comments')) { //ブログのテーブルが無かったら作る
            Schema::create('comments', function (Blueprint $commentstable) {
                $commentstable->bigIncrements('comment_id'); //勝手に採番される
                $commentstable->foreignId('article_id');
                $commentstable->text('text', 30);

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
