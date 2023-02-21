<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Inertia\Inertia;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // displays the blog index page with the posts
    public function index()
    {
	// removed ->with
	$posts = Post::orderBy('created_at', 'desc')->paginate(20);
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
		    'title' => 'required|max:255',
		    'body' => 'required',
		    'image' => 'required|mimes:jpg,png,jpeg|max5848'
	    ]);

	    $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

	    $post = new Post;
	    $post->title = $validatedData['title'];
	    $post->body = $validatedData['body'];
	    $post->image = $validatedData['image'];
	    $post->save();

	    return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
	    return Inertia::render('Posts/Edit', [
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
    public function update(Request $request, Post $post)
    {
	    $validatedData = $request->validate([
		'title' => 'required|max:255',
		'body' => 'required',
	    ]);

	    $post->title = $validatedData['title'];
	    $post->body = $validatedData['body'];
	    $post->save();

	    return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

    	return redirect()->route('posts.index');
    }
}
