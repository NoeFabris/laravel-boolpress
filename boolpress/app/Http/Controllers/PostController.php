<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = [
            'posts' => Posts::orderBy('created_at', 'DESC')->get()
        ];
        return view('posts.index', $posts);
    }

    public function show($slug){
        $post = Posts::where('slug', $slug)->first();

        if(!$post) {
            abort(404);
        }

        $data = ['post' => $post];

        return view('posts.show', $data);
    }
}
