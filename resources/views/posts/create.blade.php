{{--共通化する　引用元はlayoutsフォルダのdefault.blade.php--}}
@extends('layouts.default')

@section('title','新しい投稿')
@section('content')
        <h1 class="container_heading">
            <a href="{{ url('/') }}" class="toPosts">投稿一覧へ戻る</a>
            新しい投稿
        </h1>
        <form method="post" action="{{ url('/posts')}}">
            {{ csrf_field() }}
            <p>
                <input type="text" name="title" placeholder="タイトルを入力してください">
            </p>
            <p>
                <textarea placeholder="内容を入力してください" name="body"></textarea>
            </p>
            <p>
                <input type="submit" placeholder="投稿"> 
            </p>
        </form>
@endsection
