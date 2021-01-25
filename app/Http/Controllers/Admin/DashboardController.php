<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardGroup;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::query()->count(),
            'subscriptions' => Subscription::query()->count(),
            'plans' => Plan::query()->count(),
            'groups' => CardGroup::query()->count(),
            'cards' => Card::query()->count(),
            'pages' => Page::query()->count(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
