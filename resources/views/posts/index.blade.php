{{--共通化する　引用元はlayoutsフォルダのdefault.blade.php--}}
@extends('layouts.default')

@section('title','Blog')
@section('content')
        <h1 class="container_heading">
            <a href="{{ url('/posts/create') }}" class="toNewPost">新しい投稿</a>
            Blog
        </h1>
        <ul>
            @foreach ($posts as $post)
                <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
            @endforeach
        </ul>
@endsection
