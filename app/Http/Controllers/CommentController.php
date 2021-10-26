<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{


   public function store(Request $request){
/*     dd($request);  */

        $request->validate(
            [
                'article_id' => 'required|numeric|exists:articles,id',
                'text'    => 'required|string|max:50',
            ],
            [
                'article_id.required' => '入力値が不正です',
                'article_id.numeric'  => '入力値が不正です',
                'article_id.exists'   => '入力値が不正です',
                'text.required'    => 'コメントは必須です。',
                'text.string'      => 'コメントには文字列を入力してください。',
                'text.max'         => 'コメントは50文字以下です。',
            ]
        );

       //コメントを登録
        Comment::create([
            'article_id' => $request->article_id,
            
            'text'    => $request->text,
        ]);
        /* dd($request->article_id); */
        return redirect()->route('comments.show', $request->article_id);

    }

    public function show($id){
        
        $article = Article::find($id);
/*         dd($article); 
        exit; */
        
        $comments = $article->comments()->get();
        
        // Post::find($id)みたいなことを書くことなく{posts}を受け取ることができる
        return view('comments.index', [
            'article'     => $article,
            'comments' => $comments,
        ]);
    }

    public function destroy($comment_id){

        $comment = Comment::find($comment_id);
        $article_id = $comment->article_id;

        $comment->delete();

        return redirect()->route('comments.show',$article_id);
    }
    
}
    