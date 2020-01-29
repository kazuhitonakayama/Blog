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
}
