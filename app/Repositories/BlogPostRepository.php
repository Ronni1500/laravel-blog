<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }

    public function getConcretecategoryPosts($slug, $countsOnPage = 0) {
        $idCategory = $this->blogCategoryRepository
            ->getIdCategoryOnSlug($slug);

        $items = $this->startConditions()
            ->where(['category_id' => $idCategory])
            ->paginate($countsOnPage);
        return $items;
    }

    public function getPost($slug)
    {
        $items = $this->startConditions()
            ->where(['slug' => $slug])
            ->get()->first();
        return $items;
    }
}
