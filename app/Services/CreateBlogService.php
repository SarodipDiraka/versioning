<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class CreateBlogService
{

    public function make(Request $request)
    {

        $user = auth()->user();

        $blog = new Blog;

        $blog->user_id = $user->id;

        $blog->title = $request->title;

        $blog->content = $request->content;

        $blog->save();


        return $blog; 

    }
}