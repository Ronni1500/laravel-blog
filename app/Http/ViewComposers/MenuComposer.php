<?php

namespace App\Http\ViewComposers;

use App\Models\BlogCategory;
use Illuminate\View\View;

class MenuComposer
{
    private $items = [
        'главная',
        'О нас',
    ];
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
        return $view->with('menuitems', $this->getCategories());
    }
}
