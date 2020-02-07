{{--共通化する　引用元はlayoutsフォルダのdefault.blade.php--}}
@extends('layouts.default')

@section('title','おしごりすと！楽しくやろう！')
@section('content')
        <h1 class="container_heading">
            <a href="{{ url('/posts/create') }}" class="toNewPost">新しい投稿</a>
            おしごりすと！楽しくやろう！
        </h1>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    <a href="/posts/{{$post->id}}/edit" class="edit">[ちょっと変更]</a>
                    <a href="#" class="del" data-id="{{ $post->id }}">[終わった！]</a>
                    <form method="post" action="{{ url('/posts',$post->id) }}" id="form_{{ $post->id }}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                    </form>
                </li>
            @endforeach
        </ul>
{{-- asset()によって自動的にpublicの中をのぞくように --}}
<script src="{{ asset('/js/main.js') }}"></script>
@endsection
