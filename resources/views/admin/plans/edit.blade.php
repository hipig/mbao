@extends('layouts.admin')
@section('title', '方案编辑')

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
    <h1 class="text-3xl text-gray-900">编辑</h1>
  </div>
  <x-card title="编辑 {{ $plan->name }}">
    <x-form action="{{ route('admin.plans.update', $plan) }}" method="put">
      <x-form.input label="名称" name="name" value="{{ $plan->name }}" placeholder="请输入名称"></x-form.input>
      <x-form.display label="标识" name="key" value="{{ $plan->key }}" placeholder="请输入标识"></x-form.display>
      <x-form.input type="number" label="价格" name="period" value="{{ $plan->price }}" placeholder="请输入价格">
        <x-slot name="left">
          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">￥</span>
        </x-slot>
      </x-form.input>
      <x-form.input type="number" label="时长" name="period" value="{{ $plan->period }}" placeholder="请输入时长"></x-form.input>
      <x-form.select label="周期" name="interval" placeholder="请输入周期">
        @foreach(\App\Models\Plan::$intervalMap as $key => $item)
          <option value="{{ $key }}" {{ $plan->interval == $key ? 'selected' : '' }}>{{ $item }}</option>
        @endforeach
      </x-form.select>
      <x-form.textarea label="描述" name="description" value="{{ $plan->description }}" placeholder="请输入描述"></x-form.textarea>
    </x-form>
  </x-card>
@endsection
