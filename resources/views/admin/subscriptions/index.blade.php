@extends('layouts.admin')
@section('title', '订阅')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '订阅'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">订阅</h1>
    <x-button to="{{ route('admin.subscriptions.create') }}" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">添加</x-button>
  </div>
  <x-card title="订阅列表">
    <x-slot name="action">
      <x-table.filter>
        <x-form.select label="状态" label-class="text-sm" name="status" placeholder="请选择状态" class="py-1 px-2 text-sm">
          <option value="all" {{ request()->query('status') == 'all' ? 'selected' : '' }}>全部</option>
          @foreach(\App\Models\Subscription::$statusMap as $key => $label)
            <option value="{{ $key }}" {{ request()->query('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
          @endforeach
        </x-form.select>
      </x-table.filter>
    </x-slot>
    <div class="-m-5">
      <table class="w-full whitespace-nowrap border-collapse">
        <thead>
        <tr>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">方案</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">用户</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">状态</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">创建时间</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($subscriptions as $subscription)
          <tr>
            <td class="px-5 py-3 border-b border-gray-100">
              <a href="{{ route('admin.plans.edit', $subscription->plan) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $subscription->plan->name }}</a>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center">
                <div class="mr-3">
                  <img class="h-6 w-6 rounded-full" src="{{ Avatar::create($subscription->user->name)->toBase64() }}" alt="{{ $subscription->user->name }}">
                </div>
                <a href="{{ route('admin.users.edit', $subscription->user) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $subscription->user->name }}</a>
              </div>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @switch($subscription->status)
                @case('active')
                  <x-label type="success">{{ $subscription->status_text }}</x-label>
                @break
                @case('inactive')
                  <x-label type="info">{{ $subscription->status_text }}</x-label>
                @break
                @default
                <x-label>{{ $subscription->status_text }}</x-label>
              @endswitch
            </td>
            <td class="px-5 py-3 border-b border-gray-100">{{ $subscription->created_at }}</td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center space-x-2">
                <x-button to="#" size="text-sm py-1 px-3" class="border-gray-800 text-gray-800 bg-transparent hover:text-white hover:bg-gray-800 focus:ring-gray-800">详情</x-button>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-5 py-10 text-gray-500 text-center">暂无数据。</td>
          </tr>
        @endforelse
        </tbody>
      </table>
      <div class="px-5 py-4">
        {{ $subscriptions->links('admin.partials.pagination') }}
      </div>
    </div>
  </x-card>
@endsection
