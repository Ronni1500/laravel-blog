<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Blog\BaseController;
use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $posts = BlogPost::search($request->input('q'))->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * @param $slug
     * @param BlogPostRepository $postRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug, BlogPostRepository $postRepository){
        $post = $postRepository->getPost($slug);
        return view('posts.detail', compact('post'));
    }

    /**
     * @param $date
     * @param BlogPostRepository $postRepositoryt
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archive($date, BlogPostRepository $postRepositoryt){
        $posts = $postRepositoryt->getArhivePost($date);
        return view('posts.index', compact('posts'));
    }
}
