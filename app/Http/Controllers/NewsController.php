<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsOrderRequest;
use App\Http\Requests\NewsReviewRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = (new News())->getAll();
        return view('news.index', [
            'newsList'   => $news
        ]);
    }

    public function show(int $id)
    {
        $news = (new News())->getById($id);
        if(empty($news)) {
            abort(404, 'News not found');
        }
        return view('news.show', [
            'news'       => $news
        ]);;
    }

    public function review()
    {
        return view('news.review');
    }

    public function storeReview(NewsReviewRequest $request)
    {
        $data = $request->only(['name', 'review']);
        $saveFile = function (array $data) {
            $responseData = [];
            $fileReviews = storage_path('app/reviews.txt');
            if(file_exists($fileReviews)) {
                $file = file_get_contents($fileReviews);
                $response = json_decode($file, true);
            }
            $responseData[] = $data;
            if(isset($response) && !empty($response)) {
                $r = array_merge($response, $responseData);
            }else {
                $r = $responseData;
            }
            file_put_contents($fileReviews, json_encode($r));

        };

        $saveFile($data);

        return redirect()->route('index')->with('success', 'Отзыв успешно добавлен');
    }

    public function order()
    {
        return view('news.order');
    }

    public function storeOrder(NewsOrderRequest $request)
    {
        $data = $request->only(['name', 'phone', 'email', 'info']);
        $saveFile = function (array $data) {
            $responseData = [];
            $fileOrders = storage_path('app/orders.txt');
            if(file_exists($fileOrders)) {
                $file = file_get_contents($fileOrders);
                $response = json_decode($file, true);
            }
            $responseData[] = $data;
            if(isset($response) && !empty($response)) {
                $r = array_merge($response, $responseData);
            }else {
                $r = $responseData;
            }
            file_put_contents($fileOrders, json_encode($r));

        };

        $saveFile($data);

        return redirect()->route('index')->with('success', 'Ваш заказ успешно добавлен, наш менеджер свяжется с Вами в ближайшее время');
    }
}
