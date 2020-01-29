<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog</title>
</head>
<body>
    <div class="container">
        <h1>Blog</h1>
        <ul>
            @foreach ($posts as $post)
                <li><a href="">{{$post->title}}</a></li>
            @endforeach
        </ul>
    </div>
</body>
</html>