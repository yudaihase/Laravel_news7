




<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Laravelnews</title>

</head>

<body>

<h3>{{ $article->title }}</h3>

    <hr>
    <p>記事:{{ $article->text }}</p>


    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea rows="10" cols="60" name="text" class="inputFlex articleInput"></textarea>
                <input type="submit" value="コメントする" class="submitStyle">

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

        @if (count($comments) > 0)
        @foreach($comments as $comment)
                    <hr>
                        <p>{{ $comment->text }}</p>
                        {!! Form::model($comment, ['route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'class' => 'comment']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @csrf
                        <input type="submit" value="コメントを消す" class="submitStyle">
                        </form>
                    @endforeach
                    @endif



</body>

</html>
