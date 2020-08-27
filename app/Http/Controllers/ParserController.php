<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        $objParser = new ParserService('https://news.yandex.ru/music.rss');
        dd($objParser->getData());

    }

    public function add(string $cat)
    {
        $store = new News();
        if($cat == 'music'){
            $rss = 'https://news.yandex.ru/music.rss';
        }elseif ($cat == 'sport'){
            $rss = 'https://news.yandex.ru/sport.rss';
        }
        $objParser = new ParserService($rss);
        $obj = $objParser->getData();
        foreach ($obj['news'] as $item){
            $store->loadNews($item);
        }
        return redirect()->route('index');

    }


}
