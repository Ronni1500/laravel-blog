<?php


namespace App\Repositories;


use App\Models\BlogCategory as Model;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{


    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id){
        return $this->startConditions()->find($id);
    }

    /**
     * @return mixed
     */
    public function getComboBox()
    {
        return $this->startConditions()->all();
    }

    /**
     * @param $slug
     * @return int
     */
    public function getIdCategoryOnSlug($slug): int
    {
        $result = $this->startConditions()
            ->where(['slug' => $slug])
            ->selectRaw('id')
            ->toBase()
            ->get();
        return $result->first()->id;
    }

    /**
     * @return mixed
     */
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
