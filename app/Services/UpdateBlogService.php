<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class UpdateBlogService
{

    public function make(Request $request)
    {

        $user = auth()->user();

        $id = $request->id;
        $blog = Blog::find($id);

        if($user->id == $blog->user_id)
        {
            $blog->title = $request->title;

            $blog->content = $request->content;

            $blog->save();
        }

    }
}