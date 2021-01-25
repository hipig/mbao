<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index(Request $request)
    {
        $cardQuery = Card::query();

        if ($request->has('group_id')) {
            $cardQuery->where('group_id', $request->group_id);
        }

        $cards = $cardQuery->get();

        return CardResource::collection($cards);
    }
}
