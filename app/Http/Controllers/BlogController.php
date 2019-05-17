<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    protected $limit = 3;
    
    public function index(){
        // die('Blog E');
        // $posts = Post::with('author')->orderBy('created_at','desc')->get();
        // atau bisa pakai latest
        // $posts = Post::with('author')->latest()->get();
        // atau bisa pakai scope supaya lebih rapi katanya
        // $posts = Post::with('author')->LatestFirst()->get();
        // ntuk pagination get ganti paginate
        // $posts = Post::with('author')->LatestFirst()->paginate(3);
        // jika ingin tampilan paginate jadul 
        // $posts = Post::with('author')->LatestFirst()->simplePaginate($this->limit);
        // ganti yang publish
        // \DB::enableQueryLog();
        $posts = Post::with('author')
                        ->LatestFirst()
                        ->published()
                        ->paginate($this->limit);
        return view ("blog.index", compact('posts'));
        // dd(\DB::getQueryLog());
    }   

    public function show($id)
    {
        // die("show");
        $post = Post::findOrFail($id);
        return view("blog.show", compact('post'));
    }

    // cara debugging
    // public function index(){
    //     // die('Blog E');
    //     \DB::enableQueryLog();
    //     $posts = Post::with('author')->get();
    //     // $posts = Post::all();
    //     // return hilang plus render
    //     view ("blog.index", compact('posts'))->render();
    //     dd(\DB::getQueryLog());
    // }   
    // end debug
}
