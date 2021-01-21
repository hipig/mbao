<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubscriptionCreateRequest;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::query()->with(['user', 'plan'])->latest()->paginate();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        $plans = Plan::query()->status()->get();
        $users = User::query()->get();

        return view('admin.subscriptions.create', compact('plans', 'users'));
    }

    public function store(SubscriptionCreateRequest $request)
    {
        Subscription::create($request->only([
            'plan_id',
            'user_id',
            'started_at',
        ]));

        return redirect()->route('admin.subscriptions.index')->with('success', '保存成功');
    }
}
