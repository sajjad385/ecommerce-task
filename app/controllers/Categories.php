<?php

class Categories extends Controller
{

    /**
     * @var mixed
     */
    private $categoryModel;

    public function __construct()
    {
        //new model instance

        $this->categoryModel = $this->model('Category');
    }

    public function index()
    {

        $categories = $this->categoryModel->getCategories();
        $data = [
            'categories' => $categories
        ];

        $this->view('categories/index', $data);
    }

    public function tree()
    {
        $categories = $this->categoryModel->getCategoriesWithSubcategory();
        $data = [
            'categories' => $categories
        ];
        /*
         * Loop through array and sum item counts of child categories
         */
        foreach ($data['categories'] as &$item) {
            if ($item->parent_id == null) {
                $childSum = $this->sumChildItemCounts($item->Id, $data['categories']);
                $item->item_count += $childSum;
            }
        }

        $data = $this->createCategoryTree($data['categories']);
        $this->view('categories/tree', $data);
    }

    /**
     * @param $parentId
     * @param $array
     * @return int
     */
    private function sumChildItemCounts($parentId, &$array)
    {
        $sumItemCount = 0;
        foreach ($array as &$item) {
            if ($item->parent_id == $parentId) {
                $sumItemCount += $item->item_count;
                $childSum = self::sumChildItemCounts($item->Id, $array);
                $item->item_count += $childSum;
                $sumItemCount += $childSum;
            }
        }
        return $sumItemCount;
    }

    /**
     * @param $categories
     * @param null $parentCategoryId
     * @param int $level
     * @return string
     */
    private function createCategoryTree($categories, $parentCategoryId = null, $level = 0)
    {
        $html = "";
        $subCategories = array_filter($categories, function ($category) use ($parentCategoryId) {
            return $category->parent_id == $parentCategoryId;

        });
        if (!empty($subCategories)) {
            $html .= "<ul>";
            foreach ($subCategories as $category) {
                $html .= "<li> <i class='fa fa-file-alt' style='color: #ed973f'></i>" . str_repeat('', $level) . " " . $category->Name . "(" . $category->item_count . ")" . "</li>";
                $html .= self::createCategoryTree($categories, $category->Id, $level + 1);
            }
            $html .= "</ul>";
        }
        return $html;
    }
}
                        
