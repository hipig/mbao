@extends('layouts.admin')
@section('title', '编辑方案')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '方案' => route('admin.plans.index'),
      '编辑'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">编辑 {{ $plan->name }}</h1>
  </div>
  <x-card>
    <x-form action="{{ route('admin.plans.update', $plan) }}" method="put">
      <x-form.input label="名称" name="name" value="{{ $plan->name }}" placeholder="请输入名称"></x-form.input>
      <x-form.display label="标识" name="key" value="{{ $plan->key }}" placeholder="请输入标识"></x-form.display>
      <x-form.input label="价格" name="price" value="{{ $plan->price }}" placeholder="请输入价格">
        <x-slot name="left">
          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">￥</span>
        </x-slot>
      </x-form.input>
      <div class="grid grid-cols-6 gap-x-6">
        <div class="col-span-6 sm:col-span-3">
          <x-form.input type="number" label="时长" name="period" value="{{ $plan->period }}" placeholder="请输入时长" hint="<code>-1</code> 为不限制"></x-form.input>
        </div>
        <div class="col-span-6 sm:col-span-3">
          <x-form.select label="周期" name="interval" placeholder="请输入周期">
            @foreach(\App\Models\Plan::$intervalMap as $key => $item)
              <option value="{{ $key }}" {{ $plan->interval == $key ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
          </x-form.select>
        </div>
      </div>
      <x-form.textarea label="描述" name="description" value="{{ $plan->description }}" placeholder="请输入描述"></x-form.textarea>
      <x-form.switch label="状态" name="status" :value="$plan->status"></x-form.switch>
      <x-form.input type="number" label="排序" name="index" value="{{ $plan->index }}" placeholder="请输入排序"></x-form.input>
      <div class="mb-5 flex items-center overflow-hidden">
        <div class="text-gray-500">功能配置</div>
        <div class="ml-4 flex-1 bg-gray-200 h-px"></div>
      </div>
      <div class="grid grid-cols-6 gap-x-6">
        @foreach($plan->features as $feature)
          <div class="col-span-6 sm:col-span-2">
            @switch($feature->type)
              @case('input')
                <x-form.input label="{{ $feature->label }}" name="features[{{ $feature->key }}]" value="{{ $feature->value }}"></x-form.input>
              @break
              @case('select')
                <x-form.select label="{{ $feature->label }}" name="features[{{ $feature->key }}]">
                  @foreach(\App\Models\PlanFeature::$statusMap as $k => $v)
                    <option value="{{ $k }}" {{ $feature->value == $k ? 'selected' : '' }}>{{ $v }}</option>
                  @endforeach
                </x-form.select>
              @break
            @endswitch
          </div>
        @endforeach
      </div>
      <div class="flex items-center justify-between">
        <x-button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">保存</x-button>
      </div>
    </x-form>
  </x-card>
@endsection
