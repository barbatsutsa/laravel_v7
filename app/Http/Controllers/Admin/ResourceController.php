<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourcesCreateRequest;
use App\Models\Resourse;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $resourcesList = Resourse::all();
        return view('admin.resources.index', ['resourcesList' => $resourcesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(ResourcesCreateRequest $request)
    {
        $data = $request->validated();

        $resources = Resourse::create($data);
        if ($resources) {
            return redirect()->route('resourses.index')->with('success',
                trans('messages.admin.resourse.store.success'));
        }

        return back()->with('error', trans('messages.admin.resourse.store.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resourse  $resourse
     * @return \Illuminate\Http\Response
     */
    public function show(Resourse $resourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resourse  $resourse
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Resourse $resourse)
    {
        return view('admin.resources.edit', ['resourse' => $resourse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resourse  $resourse
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Resourse $resourse)
    {
        $resourse->title = $request->input('title');
        $resourse->url = $request->input('url');

        if($resourse->save()) {
            return redirect()->route('resourses.index')->with('success',
                __('messages.admin.resourse.update.success'));
        }

        return back()->with('error', __('messages.admin.resourse.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resourse  $resourse
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Resourse $resourse)
    {
        $resourse->news()->detach($sourses_id);
        $resourse->delete();
        return redirect()->route('resourses.index')->with('success', 'Источник успешно удален');
    }
}
