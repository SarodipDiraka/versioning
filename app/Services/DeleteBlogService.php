<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class DeleteBlogService
{

    public function make($id)
    {

        $user = auth()->user();

        $blog = Blog::find($id);

        if($user->id == $blog->user_id)
        {
            $blog->delete();
        }

    }
}