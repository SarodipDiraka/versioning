<?php

namespace App\Http\Controllers;


use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\CreateBlogService;
use App\Models\Blog;


class BlogController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->createBlogService = new createBlogService;
    }

    public function index()
    {
        $blogs = $this->blogRepository->all();

        return view('blog', compact('blogs'));
    }

    public function detail($id, ?string $version = null)
    {
        $blogs = $this->blogRepository->getByUser($id);

        return view('blog', compact('blogs'));
    }

    public function blogV1(Request $request)
    {

            if(Auth::id())
            {
                $this->createBlogService->make($request);
            }
    
            return redirect('/');

    
    }

    public function blogV2(Request $request)
    {
       
            if(Auth::id())
            {
                $this->createBlogService->make($request);
                $user = auth()->user();
            }
    
            return redirect('/detail'.'/'.$user->id);
        
    
    }
}