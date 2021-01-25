<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardGroupResource;
use App\Models\CardGroup;
use Illuminate\Http\Request;

class CardGroupsController extends Controller
{
    public function index()
    {
        $cardGroups = CardGroup::query()->status()->paginate();

        return CardGroupResource::collection($cardGroups);
    }
}
