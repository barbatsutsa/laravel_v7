<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $newsList = News::all();
        return view('admin.news.index', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {

        $data = $request->validated();
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();

            $upload = $file->storeAs('news', $name);
            if($upload) {
                $data['img'] = $upload;
            }
        }

        if (!$data['slug']) {
            $data['slug'] = Str::slug($data['title'], "-");
        }

        $news = News::create($data);
        if ($news) {
            return redirect()->route('news.index')->with('success',
                trans('messages.admin.news.store.success'));
        }

        return back()->with('error', trans('messages.admin.news.store.fail'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $news->img =$request->input('img');
        $news->title = $request->input('title');
        $news->description = $request->input('description');

        if($news->save()) {
            return redirect()->route('news.index')->with('success',
                __('messages.admin.news.update.success'));
        }

        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->categories()->detach($category_id);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
    }

    public function add()
    {
        return view('news.add');
    }


}
