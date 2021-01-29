<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanCreateRequest;
use App\Http\Requests\Admin\PlanUpdateRequest;
use App\ModelFilters\Admin\PlanFilter;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::filter($request->all(), PlanFilter::class)->latest()->paginate();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(PlanCreateRequest $request)
    {
        $plan = Plan::create($request->only([
            'name',
            'key',
            'price',
            'period',
            'interval',
            'description',
            'status',
            'index',
        ]));

        $plan_id = $plan->getKey();
        foreach ($request->features as $key => $value) {
            $plan->features()->updateOrCreate(compact('plan_id', 'key'), compact('plan_id', 'key', 'value'));
        }

        return redirect()->route('admin.plans.index')->with('success', '保存成功');
    }

    public function edit(Plan $plan)
    {
        $features = $plan->features()->pluck('value', 'key');
        return view('admin.plans.edit',  compact('plan', 'features'));
    }

    public function update(PlanUpdateRequest $request, Plan $plan)
    {
        $plan->fill($request->only([
            'name',
            'key',
            'price',
            'period',
            'interval',
            'description',
            'status',
            'index',
        ]));
        $plan->save();

        $plan_id = $plan->getKey();
        foreach ($request->features as $key => $value) {
            $plan->features()->updateOrCreate(compact('plan_id', 'key'), compact('plan_id', 'key', 'value'));
        }

        return back()->with('success', '保存成功');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        $plan->features()->delete();

        return back()->with('success', '操作成功');
    }
}
