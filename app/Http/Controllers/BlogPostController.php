<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
      // Validate input
    $validated = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    // Create new blog post
    $post = new BlogPost;
    $post->title = $validated['title'];
    $post->body = $validated['body'];
    $post->slug = Str::slug($validated['title'], '-');
    $post->user_id = Auth::id(); // set user_id to ID of authenticated user

    // Upload image if present
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images');
        $post->image = Storage::url($path);
    }

    // Save blog post to database
    $post->save();

    // Redirect to blog post index page
    return redirect()->route('post.index');
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
    public function update(Request $request, $id)
    {
      // Validate input
    $validated = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    // Create new blog post
    $post = new BlogPost;
    $post->title = $validated['title'];
    $post->body = $validated['body'];
    $post->slug = Str::slug($validated['title'], '-');
    $post->user_id = Auth::id(); // set user_id to ID of authenticated user

    // Upload image if present
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/images');
        $post->image = Storage::url($path);
    }

    // Save blog post to database
    $post->save();

    // Redirect to blog post index page
    return redirect()->route('post.index');
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
