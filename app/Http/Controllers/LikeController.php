<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\BlogPost;


class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the blog post by its ID
        $post = BlogPost::findOrFail($request->input('post_id'));

        // Create the like
        $like = new Like;
        $like->user_id = $user->id;
        $like->blog_post_id = $post->id;
        $like->save();

        // Redirect back to the blog post
        return redirect()->route('post.show', $post->slug);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BlogPost $post)
    {
        //Check if post is likedBy user making request
        if($post->likedBy($request->user())){
            return response(null, 409);
        };
        
        //Go into post likes and create new instance of likes and assign to user id
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
     
        
        return back();
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the like by its ID
        $like = Like::findOrFail($request->input('like_id'));

        // Check if the authenticated user owns the like
        if ($like->user_id !== $user->id) {
            return redirect()->back()->withErrors(['message' => 'You do not have permission to perform this action.']);
        }

        // Delete the like
        $like->delete();

        // Redirect back to the blog post
        return redirect()->route('post.show', $like->blogPost->slug);
    }
}
