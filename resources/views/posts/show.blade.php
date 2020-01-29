<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$post->title}}</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="container_heading">{{$post->title}}</h1>
        <p>{!! nl2br(e($post->body)) !!}</p>
    </div>
</body>
</html>