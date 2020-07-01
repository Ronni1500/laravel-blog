<?php

namespace App\Http\Controllers\Blog;

use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Blog
 */
class CategoryController extends BaseController
{
    /**
     * @param $slug
     * @param BlogPostRepository $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug, BlogPostRepository $post) {
        $items = $post->getConcretecategoryPosts($slug, 10);
        return view('posts.index', compact('items'));
    }
}
