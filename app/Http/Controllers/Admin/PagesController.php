<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageCreateRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::query()->latest()->paginate();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageCreateRequest $request)
    {
        Page::create($request->only([
            'name',
            'key',
            'content',
            'status',
        ]));

        return redirect()->route('admin.pages.index')->with('success', '保存成功');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit',  compact('page'));
    }

    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->fill($request->only([
            'name',
            'key',
            'content',
            'status',
        ]));
        $page->save();

        return back()->with('success', '保存成功');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show',  compact('page'));
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return back()->with('success', '操作成功');
    }
}
