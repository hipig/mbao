@extends('layouts.admin')
@section('title', '编辑方案')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '订阅' => route('admin.users.index'),
      '添加'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">添加订阅</h1>
  </div>
  <x-card>
    <x-form action="{{ route('admin.subscriptions.store') }}" class="space-y-5">
      <x-form.select label="方案" name="plan_id" placeholder="请选择方案">
        @foreach($plans as $plan)
          <option value="{{ $plan->id }}">{{ $plan->name }}</option>
        @endforeach
      </x-form.select>
      <x-form.select label="用户" name="user_id" placeholder="请选择用户">
        @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </x-form.select>
      <x-form.input label="开始时间" name="started_at" value="{{ now() }}" placeholder="请输入开始时间">
        <x-slot name="left">
          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </span>
        </x-slot>
      </x-form.input>
      <div class="flex items-center justify-between">
        <x-button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">保存</x-button>
      </div>
    </x-form>
  </x-card>
@endsection
