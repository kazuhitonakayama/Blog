<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="container_heading">Blog</h1>
        <ul>
            @foreach ($posts as $post)
                <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
            @endforeach
        </ul>
    </div>
</body>
</html>