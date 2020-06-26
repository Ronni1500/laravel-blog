<?php


namespace App\Http\ViewComposers;

use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;
use Illuminate\View\View;

class ArchivePosts
{
    private $blogPostRepository;

    public function __construct()
    {
        $this->blogPostRepository = app(BlogPostRepository::class);
    }
    public function compose(View $view)
    {
        $items = $this->blogPostRepository->listMonthArchivePosts();
        return $view->with('list_archive', $items);
    }
}
