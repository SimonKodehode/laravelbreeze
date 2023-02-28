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

        return Inertia::render('Comments/Index', [
            'comments' => $comments
        ]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
            'content' => 'required',
            'post_id' => 'required'
        ]);

        $comment = Comment::create([
            'content' => $validatedData['content'],
            'post_id' => $validatedData['blogpost_id'],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('posts.show', $comment->blogpost->slug);
  }

    public function edit(Comment $comment)
    {
      return Inertia::render('Comments/Edit', [
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
