<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
	    return [
		    'slug' => [
			    'source' => 'title'
		    ]
	    ];
    }

    public function likes()
    {
	    return $this->belongsTo(User::class);
    }

}
