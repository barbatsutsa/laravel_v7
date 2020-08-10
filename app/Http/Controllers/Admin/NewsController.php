<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->news;
        $fileName = storage_path('app/news.txt');
        if(file_exists($fileName)) {
            $file = file_get_contents($fileName);
            $newsFile = json_decode($file, true);
        }
        if(isset($newsFile) && !empty($newsFile)) {
            $news = $newsFile;
        }

        return  view('admin.news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('admin.news.create');
        //return redirect()->route('admin.news.edit', ['id' => 2]);
    }

    public function store(NewsCreateRequest $request)
    {
        $data = $request->only(['id', 'title', 'text']);
        $saveFile = function (array $data) {
            $responseData = [];
            $fileNews = storage_path('app/news.txt');
            if(file_exists($fileNews)) {
                $file = file_get_contents($fileNews);
                $response = json_decode($file, true);
            }
            $responseData[] = $data;
            if(isset($response) && !empty($response)) {
                $r = array_merge($response, $responseData);
            }else {
                $r = $responseData;
            }
            file_put_contents($fileNews, json_encode($r));

        };

        $saveFile($data);

        return redirect()->route('admin.news')->with('success', 'Новость успешно добавлена');
    }

    public function edit(int $id)
    {
        return "Редактирование новости - " .$id;
    }

    public function api()
    {
        $file =  file_get_contents(storage_path('app/news.txt'));
        $data = json_decode($file, true);
        return response()->json($data);

    }
}
