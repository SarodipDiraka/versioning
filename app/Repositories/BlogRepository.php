<?php

namespace App\Repositories;

use App\Models\Blog;
use App\User;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return Blog::all();
    }

    public function getByUser($id)
    {
        return Blog::where('user_id', $id)->get();
    }
}