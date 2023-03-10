<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    //Soft Delete
    use SoftDeletes;

    //Create Post
    protected $fillable = [
      'title','information','description','published_at'
    ];
}
