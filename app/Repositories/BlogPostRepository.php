<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;
use Carbon\Carbon;

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

    public function listMonthArchivePosts()
    {
        $items = $this->startConditions()
            ->where('is_published' ,'1')
            ->selectRaw('created_at')
            ->toBase()
            ->get();
        $timestamp = strtotime($items[0]->created_at);
        $result = [];
        foreach ($items as $item) {
            $tpm_timestamp = strtotime($item->created_at);
            $year = date('Y', $tpm_timestamp);
            $month = date('m', $tpm_timestamp);
            if(!key_exists($year, $result)){
                $result[$year] = [];
            } else {
                if(!in_array($month, $result[$year])) {
                    $result[$year][] = $month;
                }
            }
        }
        return $result;
    }
}
