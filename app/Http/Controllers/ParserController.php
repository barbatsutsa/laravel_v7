<?php

namespace App\Http\Controllers;

use App\Jobs\NewsParsing;
use App\Models\News;
use App\Models\Resourse;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
     public function index(ParserService $parserService)
    {
        $start = date('c');
        $rssLinks = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];

        foreach ($rssLinks as $link) {
            //$parserService->saveNews($link);
            NewsParsing::dispatch($link);
        }

        return $start . ' ' . date('c');
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

    public function res()
    {
        $store = new News();
        $resourcesList = Resourse::all();
        foreach ($resourcesList as $res){
            if($res->url) {
                $rss = $res->url;
                $objParser = new ParserService($rss);
                $obj = $objParser->getData();
                foreach ($obj['news'] as $item) {
                    $store->loadNews($item);
                }
            }
        }
        return redirect()->route('index');
    }


}
