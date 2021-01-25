<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show(Page $page)
    {
        return PageResource::make($page);
    }
}
