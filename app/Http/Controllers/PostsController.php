<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //
    /** 投稿の一覧画面へ遷移 */
    public function index () {
       //$posts = Post::all();
       //$posts = Post::orderBy('created_at','desc')->get();
         $posts = Post::latest()->get();
       //dd($posts->toArray());  //dump die の種類
       //return view('posts.index',['posts'=>$posts]);
        return view('posts.index')->with('posts',$posts);
    }

    /** 投稿の詳細画面へ遷移 */
    public function show ($id) {
        //$post=Post::find($id);
        $posts=Post::findOrFail($id);
        return view('posts.show')->with('post',$posts);
    }

    /**新規投稿作成ページに遷移するのみ */
    public function create () {
        return view('posts.create');
    }

    /* TODO なんで$request???? */
    /**　新規投稿 */
    public function store (PostRequest $request) {
      /* このヴァリデーション部分はPostRequest.phpで対応している
      $this->validate($request,[
        'title' => 'required|min:3',
        'body'  => 'required|min:5'
      ]);
      */
      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }

    /** 編集画面へ遷移するのみ */
    public function edit ($id) {
      $posts=Post::findOrFail($id);
      return view('posts.edit')->with('post',$posts);
    }

    /** 編集画面にて、従前の投稿内容をもとに編集する */
    public function update (PostRequest $request, Post $post) {
      /* このヴァリデーション部分はPostRequest.phpで対応している
      $this->validate($request,[
        'title' => 'required|min:3',
        'body'  => 'required|min:5'
      ]);
      */
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

    /** 投稿の削除機能 */
    /** https://qiita.com/yoshinyan/items/22f4351aa857a4a10e5c */
    public function destroy(Request $request) {
      Post::find($request->id)->delete();
      return redirect('/');
    }
}
