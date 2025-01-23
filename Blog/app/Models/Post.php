<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    protected $with = ['category', 'author'];

    public function scopeFilter($query)
    {
        if (request('search')) {
            $query->where(fn() =>
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%'));

        }

        if (request('category')) {
            $query->whereHas(
                'category',
                fn($query) =>
                $query->where('slug', request('category'))
            );
        }

        if (request('author')) {
            $query->whereHas(
                'author',
                fn($query) =>
                $query->where('username', request('author'))
            );
        }


    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
