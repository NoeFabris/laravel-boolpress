<?php

namespace App\Http\Controllers\Admin;

use App\Posts;

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
    public function index()
    {
        $posts = [
            'posts' => Posts::orderBy('created_at', 'DESC')->get()
        ];
        return view('admin.posts.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'content'=>'required'
            
        ]);
        
        $newPostData = $request->all();
        $newPost = new Posts();
        $newPost->fill($newPostData);
        $newPost->user_id = $request->user()->id;


        $slug = Str::slug($newPost->title);
        $slugBase = $slug;

        $postPresente = Posts::where('slug', $slug)->first();
        $contatore = 1;

        while($postPresente){
            $slug = $slugBase . '-' . $contatore;
            $contatore++;
            $postPresente = Posts::where('slug', $slug)->first();
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
        $post = Posts::where('slug', $slug)->first();

        if(!$post) {
            abort(404);
        }

        $data = ['post' => $post];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Posts::where('slug', $slug)->first();

        // if(!$post) {
        //     abort(404);
        // }

        $data = ['post' => $post];

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
        $post = Posts::where('slug', $slug)->first();

        $request->validate([

            'title'=>'required',
            'content'=>'required'

        ]);
        
        $formData = $request->all();

        if ($formData['title'] != $post->title) {
            $slug = Str::slug($formData['title']);
            $slug_base = $slug;
            $postPresente = Posts::where('slug', $slug)->first();
            $contatore = 1;
            while ($postPresente) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $postPresente = Posts::where('slug', $slug)->first();
            }
            $formData['slug'] = $slug;
        }

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
        $post = Posts::where('slug', $slug)->first();

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
