@extends('layouts.default')

@section('title','Blog')
@section('content')
        <h1 class="container_heading">Blog</h1>
        <ul>
            @foreach ($posts as $post)
                <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
            @endforeach
        </ul>
@endsection
