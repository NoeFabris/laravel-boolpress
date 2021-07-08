<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\Mail\SendNewMail;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'posts' => Post::orderBy('created_at', 'DESC')->get()
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', ["categories" => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            
            'title'=>'required',
            'content'=>'required',
            'category_id' => "nullable|exists:categories,id",
            'tags'=>'exists:tags,id'
            
        ]);
        
        $newPostData = $request->all();
        $newPost = new Post();
        $newPost->fill($newPostData);
        $newPost->user_id = $request->user()->id;


        $slug = Str::slug($newPost->title);
        $slugBase = $slug;

        $postPresente = Post::where('slug', $slug)->first();
        $contatore = 1;

        while($postPresente){
            $slug = $slugBase . '-' . $contatore;
            $contatore++;
            $postPresente = Post::where('slug', $slug)->first();
        }

        $newPost->slug = $slug;
        // $newPost->user_id = 1;
        // $newPost->user = Auth::user()->name;
        $newPost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if(!$post) {
            abort(404);
        }

        $user = $post->user ;
        // $data = ['post' => $post];
        return view('admin.posts.show', ['post' => $post, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::all();
        $tags = Tag::all();


        $post = Post::where('slug', $slug)->first();

        // if(!$post) {
        //     abort(404);
        // }

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.posts.edit', $data);

        // return view('admin.posts.edit', [
        //     'post' => $post
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        $request->validate([

            'title'=>'required',
            'content'=>'required',
            'category_id'=>'nullable|exists:categories,id',
            'tags'=>'exists:tags,id'

        ]);
        
        $formData = $request->all();

        if ($formData['title'] != $post->title) {
            $slug = Str::slug($formData['title']);
            $slug_base = $slug;
            $postPresente = Post::where('slug', $slug)->first();
            $contatore = 1;
            while ($postPresente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $postPresente = Post::where('slug', $slug)->first();
            }
            $formData['slug'] = $slug;
        }
 
        if (!key_exists('tags', $formData)) {
            $formData['tags'] = []; 
        }

        $post->tags()->detach();
        $post->tags()->attach($formData['tags']);

        // $post->tags()->sync($formData['tags']);

        $storageResult = Storage::put('postCovers', $formData['postCover']);

        $formData['cover_url'] = $storageResult;

        $post->update($formData);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
 