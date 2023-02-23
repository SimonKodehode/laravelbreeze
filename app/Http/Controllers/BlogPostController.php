<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = BlogPost::with('likes', 'comments')->latest()->get();
      return Inertia::render('Blogs', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return Inertia::render('NewBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
      ]);

      $slug = Str::slug($validatedData['title'], '-');

      $post = new BlogPost();
      $post->title = $validatedData['title'];
      $post->body = $validatedData['body'];
      $post->slug = $slug;
      $post->user_id = auth()->user()->id;
      $post->save();

      return Redirect::route('posts.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $post = BlogPost::with('likes', 'comments')->where('slug'. $slug)->firstOrFail();
      return Inertia::render('Blogs', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

      $post = BlogPost::where('slug', $slug)->firstOrFail();

      return Inertia::render('NewBlog', [
        'post' => $post,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $post)
    {
      $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
      
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $post->delete();

        return Redirect::route('posts.index');
    }
}
