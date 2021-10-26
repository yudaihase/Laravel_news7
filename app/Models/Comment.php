<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model //modelを継承してCommentsというテーブルを作る
{
    //テーブル名を決める
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    //可変項目(保存したい値)
    protected $fillable =
    ['article_id',
    'text'
    
    
];

public function post()
    {
        return $this->belongsTo(Article::class);
    }

public $timestamps = false;
    
}
