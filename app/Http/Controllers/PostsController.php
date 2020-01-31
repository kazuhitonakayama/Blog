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
      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }
}
