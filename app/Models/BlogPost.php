<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    const PAGINATION = 15;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeSearch(Builder $query, ?string $search)
    {
        if($search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        }
    }
}
