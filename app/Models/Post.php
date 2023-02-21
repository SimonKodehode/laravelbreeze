<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'image_path'];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function likes()
    {
	    return $this->hasMany(Like::class);
    }

    public function sluggable(): array
    {
	    return [
		    'slug' => [
			    'source' => 'title'
		    ]
	    ];
    }

    public function likedBy(User $user)
    {
	    return $this->likes->contains('user_id', $user->id);
    }

}
