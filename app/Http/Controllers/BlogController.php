<?php

namespace App\Http\Controllers;


use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\CreateBlogService;
use App\Services\UpdateBlogService;
use App\Services\DeleteBlogService;
use App\Models\Blog;


class BlogController extends Controller
{
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->createBlogService = new createBlogService;
        $this->updateBlogService = new updateBlogService;
        $this->deleteBlogService = new deleteBlogService;
    }

    public function index()
    {
        $blogs = $this->blogRepository->all();

        return view('blog', compact('blogs'));
    }

    public function detailV1($id)
    {
        $blogs = $this->blogRepository->getByUser($id);

        return view('blog', compact('blogs'));
    }

    public function detailV2()
    {
        if(Auth::id())
        {
            $blogs = $this->blogRepository->getByUser(Auth::id());

            return view('posts', compact('blogs'));
        }
        else return redirect('/');
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
    
            return redirect('/detail'.'/v2'.$user->id);
        
    
    }

    public function update(Request $request)
    {
       
            if(Auth::id())
            {
                $this->updateBlogService->make($request);
                $user = auth()->user();
            }
    
            return redirect('/detail'.'/v2');
        
    
    }
    public function delete($id)
    {
       
            if(Auth::id())
            {
                $this->deleteBlogService->make($id);
                $user = auth()->user();
            }
    
            return redirect('/detail'.'/v2');
        
    
    }
}