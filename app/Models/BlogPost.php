<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title, '-');
            $latestSlug =
                static::whereRaw("slug RLIKE '^{$post->slug}(-[0-9]*)?$'")
                ->latest('id')
                ->value('slug');
            if ($latestSlug) {
                $pieces = explode('-', $latestSlug);
                $number = intval(end($pieces));
                $post->slug .= '-' . ($number + 1);
            }
        });
    }



 

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function likes()
    {
      return $this->hasMany(Like::class);
    }
    //Added likedBy
    public function likedBy(User $user)
    {
	    return $this->likes->contains('user_id', $user->id);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
}
