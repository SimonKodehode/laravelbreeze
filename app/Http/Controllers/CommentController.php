<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  public function store(Request $request, $postId)
  {
    $validatedData = $request->validate([
            'content' => 'required|min:5',
        ]);

        $post = BlogPost::findOrFail($postId);

        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = Auth::id();

        $post->comments()->save($comment);

        return redirect()->back();
    }

    public function edit($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (Gate::denies('update-comment', $comment)) {
            abort(403);
        }

        return inertia('Comments/Edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (Gate::denies('update-comment', $comment)) {
            abort(403);
        }

        $validatedData = $request->validate([
            'content' => 'required|min:5',
        ]);

        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('posts.show', $comment->blog_post_id);
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (Gate::denies('delete-comment', $comment)) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('posts.show', $comment->blog_post_id);
    }
  }
