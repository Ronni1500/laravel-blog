<?php

namespace App\Http\ViewComposers;

use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\View\View;

class MenuComposer
{
    private $items = [
        'главная',
        'О нас',
    ];
    private $blogCategoryRepository;

    public function __construct()
    {
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    private function getCategories(){
        return BlogCategory::where(['parent_id' => '1'])->get();
    }


    public function compose(View $view)
    {
        $items = $this->blogCategoryRepository->getForMenu();
        return $view->with('menuitems', $items);
    }
}
