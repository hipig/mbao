<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardGroupRequest;
use App\ModelFilters\Admin\CardGroupFilter;
use App\Models\CardGroup;
use Illuminate\Http\Request;

class CardGroupsController extends Controller
{
    public function index(Request $request)
    {
        $cardGroups = CardGroup::filter($request->all(), CardGroupFilter::class)->withCount('cards')->latest()->paginate();
        return view('admin.card-groups.index', compact('cardGroups'));
    }

    public function create()
    {
        return view('admin.card-groups.create');
    }

    public function store(CardGroupRequest $request)
    {
        CardGroup::create($request->only([
            'name',
            'name_en',
            'cover',
            'color',
            'is_pro',
            'status',
            'index',
        ]));

        return redirect()->route('admin.card-groups.index')->with('success', '保存成功');
    }

    public function edit(CardGroup $card_group)
    {
        return view('admin.card-groups.edit',  compact('card_group'));
    }

    public function update(CardGroupRequest $request, CardGroup $card_group)
    {
        $card_group->fill($request->only([
            'name',
            'name_en',
            'cover',
            'color',
            'is_pro',
            'status',
            'index',
        ]));
        $card_group->save();

        return back()->with('success', '保存成功');
    }

    public function destroy(CardGroup $card_group)
    {
        $card_group->delete();
        $card_group->cards()->delete();

        return back()->with('success', '操作成功');
    }
}
