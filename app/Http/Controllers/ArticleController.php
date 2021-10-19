<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticlesRequest;

use PhpParser\Node\Expr\FuncCall;

class ArticleController extends Controller
{
    //投稿画面を表示
    public function index()
    {
        $articles = Article::all();

        /*  データの中身を見れてここで止まる
        dd($articles);*/

        return view('articles.index', ['articles' => $articles]);
    }


/*         public function comments(){
            $comments = $content->comments();
            return view('articles.detail', ['comment' => $comments]);
        } */


        public function store(Request $request){

             /* データの中身を見れてここで止まる */
            /* dd($request->all()); */
            
            //投稿のデータを受け取る
            $inputs = $request->all();

                           // バリデーションの追加
                           $request->validate([
                            'title' => 'required|max:30',
                            'text' => 'required',
                ], [
                    'title.required' => 'titleは30文字以下です。',
                    'text.required' => '記事は必須です。',
                ]);
                // ここまで

            //投稿を登録
            Article::create($inputs);
            return redirect(route('index'));

        }

}
