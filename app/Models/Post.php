<?php

namespace App\Models;

use Inertia\Inertia;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// Use eager loading to fetch posts with the associated user model
$posts = Post::with('user')->paginate(10);

// Return the data to the view
return Inertia::render('Posts/Index', [
    'posts' => $posts
]);
