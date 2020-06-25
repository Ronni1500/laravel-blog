<?php


namespace App\Repositories;


use App\Models\BlogCategory as Model;

class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id){
        return $this->startConditions()->find($id);
    }

    public function getComboBox()
    {
        return $this->startConditions()->all();
    }

    public function getForMenu()
    {
        $columns = implode(',',['title', 'slug']);

        $items = $this->startConditions()
            ->where(['parent_id' => '1'])
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $items;
    }
}
