



<?php

function hsc($protect)
{
    return htmlspecialchars($protect, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Laravelnews</title>

</head>

<body>

<h1 class='title'>Laravel News</h1>

<section class="main">
    <h2 class="subTitle">さぁ、最新のニュースをシェアしましょう</h2>

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
 
                <p class='nameFlex'>title: </p>
                <input type='text' name='title' class="inputFlex">


                <p class='nameFlex'>記事: </p>
                <textarea rows="10" cols="60" name="text" class="inputFlex articleInput"></textarea>


                <input type="submit" value="投稿" class="submitStyle">

        </form>

        @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    @endif

                    @foreach($articles as $article)
                    <hr>
                        <p>title:{{ $article->title }}</p>
                        <p>記事:{{ $article->text }}</p>
                        <p><a href="{{ route('comments.show', $article->id) }}">記事全文・コメントを見る</a></p>
                    @endforeach



</body>
</html>
