<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{
  use HasFactory;
                                            //Changed this
  protected $fillable = ['body', 'user_id', 'blog_post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->formatLocalized('%d. %B %Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->formatLocalized('%d. %B %Y');
    }

}
