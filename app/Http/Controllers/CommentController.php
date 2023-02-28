<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

  public function index()
  {
    $comments = Comment::all();

        return Inertia::render('Blogs', [
            'comments' => $comments
        ]);
  }

  public function store(Request $request, $postId)
  {

    //Body instead of content
    $request->validate([
            'body' => 'required',
            
        ]);
    //Added request body and request postId
        $comment = Comment::create([
            'body' => $request->body,
            'blog_post_id' => $postId,
            'user_id' => Auth::user()->id,
        ]);
        
                //Changed to posts.index this can be changed when things work
        return redirect()->route('home');
  }

    public function edit(Comment $comment)
    {
      return Inertia::render('Blogs', [
            'comment' => $comment
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
      $validatedData = $request->validate([
            'content' => 'required'
        ]);

        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('posts.show', $comment->blogpost->slug);
    }

    public function destroy(Comment $comment)
    {
      $comment->delete();

      return redirect()->route('posts.show', $comment->blogpost->slug);
    }
  }
