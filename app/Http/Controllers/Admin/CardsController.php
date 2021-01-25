<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardRequest;
use App\Models\Card;
use App\Models\CardGroup;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::query()->with('group')->latest()->paginate();
        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {
        $cardGroups = CardGroup::query()->status()->latest()->get();
        return view('admin.cards.create', compact('cardGroups'));
    }

    public function store(CardRequest $request)
    {
        Card::create($request->only([
            'group_id',
            'name',
            'name_en',
            'spell_cn',
            'spell_us',
            'spell_uk',
            'color',
            'cover',
            'status',
            'index',
        ]));

        return redirect()->route('admin.cards.index')->with('success', '保存成功');
    }

    public function edit(Card $card)
    {
        $cardGroups = CardGroup::query()->status()->latest()->get();
        return view('admin.cards.edit',  compact('card', 'cardGroups'));
    }

    public function update(CardRequest $request, Card $card)
    {
        $card->fill($request->only([
            'group_id',
            'name',
            'name_en',
            'spell_cn',
            'spell_us',
            'spell_uk',
            'color',
            'cover',
            'status',
            'index',
        ]));
        $card->save();

        return back()->with('success', '保存成功');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        return back()->with('success', '操作成功');
    }
}
