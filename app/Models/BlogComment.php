<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //
    protected $fillable = ['name', 'text', 'post_id'];
}
