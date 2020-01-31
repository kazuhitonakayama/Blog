@extends('layouts.default')

@section('title',$post->title)
@section('content')
        <h1 class="container_heading">{{$post->title}}</h1>
        <p>{!! nl2br(e($post->body)) !!}</p>
        <a href="/" class="backToTop">一覧へ戻る</a>
@endsection