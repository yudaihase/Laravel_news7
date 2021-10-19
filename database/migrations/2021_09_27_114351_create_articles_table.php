<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('articles')) { //ブログのテーブルが無かったら作る
            Schema::create('articles', function (Blueprint $articlestable) {
                $articlestable->bigIncrements('id'); //勝手に採番される
                $articlestable->string('title', 30);
                $articlestable->text('text');
                $articlestable->timestamps();
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
        Schema::dropIfExists('articles');
    }
}
