<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsReviewRequest;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reviewList = Feedback::all();
        return view('admin.feedback.index', ['feedback' => $reviewList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('news.review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsReviewRequest $request)
    {
        $data = $request->validated();

        $review = Feedback::create($data);
        if($review) {
            return redirect()->route('feedback.index')->with('success',
                trans('messages.admin.feedback.store.success'));
        }

        return back()->with('error', trans('messages.admin.feedback.store.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', ['reviews' => $feedback]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->name =$request->input('name');
        $feedback->review = $request->input('review');

        if($news->save()) {
            return redirect()->route('admin.feedback.index')->with('success', __('messages.admin.feedback.update.success'));
        }

        return back()->with('error', trans('messages.admin.feedback.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedback.index')->with('success', 'Отзыв успешно удален');//
    }
}
