<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategoryNews(int $category_id) {
        foreach ($news as $new) {
            if (intval($new['category_id']) === $category_id) {
                $categoryNews[] = $new;
            }
        }
        return $categoryNews;
    }

    public function getOneNews(int $id) {
        foreach ($news as $new) {
            if (intval($new['id']) === $id) {
                $oneNews[] = $new;
                break;
            }
        }
        return $oneNews;
    }

    public function getOneCategory(int $category_id) {
        foreach ($categories as $category) {
            $currentCategory = isset($category['id']) ? intval($category['id']) : 0;
            if ($currentCategory === $category_id) {
                $cat = $category['title'] ?? 'Default title';
                break;
            }
        }
        return $cat;
    }
}
