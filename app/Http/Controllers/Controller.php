<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected  $categories = [
        [
            'id' => 1,
            'title' => 'Политика'
        ],
        [
            'id' => 2,
            'title' => 'Кино'
        ],
        [
            'id' => 3,
            'title' => 'Музыка'
        ],
        [
            'id' => 4,
            'title' => 'Спорт'
        ],
        [
            'id' => 5,
            'title' => 'Театр'
        ]
    ];
    protected  $news = [
        [
            'id' => 1,
            'category_id' => '1',
            'title' => 'Новость номер 1',
            'text'  => 'Описание новости номер 1'
        ],
        [
            'id' => 2,
            'category_id' => '1',
            'title' => 'Новость номер 2',
            'text'  => 'Описание новости номер 2'
        ],
        [
            'id' => 3,
            'category_id' => '1',
            'title' => 'Новость номер 3',
            'text'  => 'Описание новости номер 3'
        ],
        [
            'id' => 4,
            'category_id' => '1',
            'title' => 'Новость номер 4',
            'text'  => 'Описание новости номер 4'
        ],
        [
            'id' => 5,
            'category_id' => '2',
            'title' => 'Новость номер 5',
            'text'  => 'Описание новости номер 5'
        ],
        [
            'id' => 6,
            'category_id' => '2',
            'title' => 'Новость номер 6',
            'text'  => 'Описание новости номер 6'
        ],
        [
            'id' => 7,
            'category_id' => '2',
            'title' => 'Новость номер 7',
            'text'  => 'Описание новости номер 7'
        ],
        [
            'id' => 8,
            'category_id' => '2',
            'title' => 'Новость номер 8',
            'text'  => 'Описание новости номер 8'
        ],
        [
            'id' => 9,
            'category_id' => '3',
            'title' => 'Новость номер 9',
            'text'  => 'Описание новости номер 9'
        ],
        [
            'id' => 10,
            'category_id' => '3',
            'title' => 'Новость номер 10',
            'text'  => 'Описание новости номер 10'
        ],
        [
            'id' => 11,
            'category_id' => '3',
            'title' => 'Новость номер 11',
            'text'  => 'Описание новости номер 11'
        ],
        [
            'id' => 12,
            'category_id' => '3',
            'title' => 'Новость номер 12',
            'text'  => 'Описание новости номер 12'
        ],
        [
            'id' => 13,
            'category_id' => '4',
            'title' => 'Новость номер 13',
            'text'  => 'Описание новости номер 13'
        ],
        [
            'id' => 14,
            'category_id' => '4',
            'title' => 'Новость номер 14',
            'text'  => 'Описание новости номер 14'
        ],
        [
            'id' => 15,
            'category_id' => '4',
            'title' => 'Новость номер 15',
            'text'  => 'Описание новости номер 15'
        ],
        [
            'id' => 16,
            'category_id' => '4',
            'title' => 'Новость номер 16',
            'text'  => 'Описание новости номер 16'
        ],
        [
            'id' => 17,
            'category_id' => '5',
            'title' => 'Новость номер 17',
            'text'  => 'Описание новости номер 17'
        ],
        [
            'id' => 18,
            'category_id' => '5',
            'title' => 'Новость номер 18',
            'text'  => 'Описание новости номер 18'
        ],
        [
            'id' => 19,
            'category_id' => '5',
            'title' => 'Новость номер 19',
            'text'  => 'Описание новости номер 19'
        ],
        [
            'id' => 20,
            'category_id' => '5',
            'title' => 'Новость номер 20',
            'text'  => 'Описание новости номер 20'
        ],
    ];

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
