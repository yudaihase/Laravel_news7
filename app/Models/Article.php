<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model //modelを継承してArticlesというテーブルを作る
{
    //テーブル名を決める
    protected $articletable = 'articles';

    //可変項目(保存したい値)
    protected $fillable =
    ['title', 'text'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
