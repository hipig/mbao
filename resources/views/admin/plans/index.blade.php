@extends('layouts.admin')
@section('title', '方案')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '方案'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">方案</h1>
    <x-button to="{{ route('admin.plans.create') }}" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">添加</x-button>
  </div>
  <x-card title="方案列表">
    <div class="-m-5">
      <table class="w-full whitespace-nowrap border-collapse">
        <thead>
        <tr>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">名称</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">价格</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">时长</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">状态</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($plans as $plan)
          <tr>
            <td class="px-5 py-3 border-b border-gray-100">
              <a href="{{ route('admin.plans.edit', $plan) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $plan->name }}</a>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($plan->price > 0)
                <span class="text-red-600">￥{{ $plan->price }}</span>
              @else
                <x-label>免费</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($plan->period === -1)
                <x-label type="warning">永久</x-label>
              @else
                <span>{{ $plan->period }}</span>
                <span>{{ $plan->interval_text }}</span>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($plan->status)
                <x-label type="success">启用</x-label>
              @else
                <x-label type="danger">禁用</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center space-x-2">
                <x-button to="{{ route('admin.plans.edit', $plan) }}" size="text-sm py-1 px-3" class="border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600">编辑</x-button>
                @if(!$plan->is_default)
                  <div x-data="{action: '{{ route("admin.plans.destroy", $plan) }}'}">
                    <x-button size="text-sm py-1 px-3" class="border-red-600 text-red-600 bg-transparent hover:text-white hover:bg-red-600 focus:ring-red-600" x-on:click="$dispatch('open-delete-modal', {action})">删除</x-button>
                  </div>
                @endif
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
        {{ $plans->links('admin.partials.pagination') }}
      </div>
      <x-table.action-delete title="删除方案" content="存在已生效的订阅记录时，将不能删除"></x-table.action-delete>
    </div>
  </x-card>
@endsection
