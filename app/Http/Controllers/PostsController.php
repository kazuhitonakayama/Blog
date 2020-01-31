<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function index () {
       //$posts = Post::all();
       //$posts = Post::orderBy('created_at','desc')->get();
         $posts = Post::latest()->get();
       //dd($posts->toArray());  //dump die の種類
       //return view('posts.index',['posts'=>$posts]);
        return view('posts.index')->with('posts',$posts);
    }

    public function show ($id) {
        //$post=Post::find($id);
        $posts=Post::findOrFail($id);
        return view('posts.show')->with('post',$posts);
    }

    public function create () {
        return view('posts.create');
    }

    /* TODO なんで$request???? */
    public function store (Request $request) {
      $this->validate($request,[
        'title' => 'required|min:3',
        'body'  => 'required|min:5'
      ]);
      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }

    public function edit ($id) {
      $posts=Post::findOrFail($id);
      return view('posts.edit')->with('post',$posts);
    }

    public function update (Request $request, Post $post) {
      $this->validate($request,[
        'title' => 'required|min:3',
        'body'  => 'required|min:5'
      ]);
      /** 
       * $requestにはPOSTで受け取った情報（ユーザーが編集した記事）が入っている。
       * findメソッドで、指定されたid（$requestのidプロパティ）に該当するレコードを取得し、$postへ代入する
       * この$articleに代入されるレコードは編集前のものである。これを、編集後の内容が代入されている$requestの内容に更新しなければならない。
       * $requestから各プロパティを呼び出し、$articleの各プロパティとして代入する。（上書き保存のイメージだ。）
       */
      $post = Post::find($request->id);
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }
}
