{{--共通化する　引用元はlayoutsフォルダのdefault.blade.php--}}
@extends('layouts.default')

@section('title','編集')
@section('content')
        <h1 class="container_heading">
            <a href="{{ url('/') }}" class="toPosts">投稿一覧へ戻る</a>
            編集
        </h1>
        <form method="post" action="{{ url('/posts', $post->id)}}">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <p>
                <input type="text" name="title" placeholder="タイトルを入力してください" value="{{ old('title',$post->title) }}">
                @if ($errors->has('title'))
                    <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </p>
            <p>
                <textarea placeholder="内容を入力してください" name="body">{{ old('body',$post->body) }}</textarea>
                @if ($errors->has('body'))
                    <span class="error">{{ $errors->first('body') }}</span>
                @endif
            </p>
            <p>
                <input type="submit" placeholder="編集"> 
            </p>
        </form>
@endsection
