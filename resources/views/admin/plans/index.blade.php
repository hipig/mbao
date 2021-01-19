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
    <x-button class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">添加</x-button>
  </div>
  <x-card title="方案列表">
    <div class="-m-5">
      <table class="table-fixed w-full">
        <thead>
        <tr>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">名称</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">价格</th>
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
                {{ $plan->price }}
              @else
                <x-label>免费</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($plan->status)
                <x-label type="green">启用</x-label>
              @else
                <x-label type="red">禁用</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center space-x-2">
                <x-button to="{{ route('admin.plans.edit', $plan) }}" size="text-sm py-1 px-3" class="border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600">编辑</x-button>
                @if(!$plan->is_default)
                  <x-form action="{{ route('admin.plans.destroy', $plan) }}" method="delete">
                    <x-button type="submit" size="text-sm py-1 px-3" class="border-red-600 text-red-600 bg-transparent hover:text-white hover:bg-red-600 focus:ring-red-600">删除</x-button>
                  </x-form>
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
      {{ $plans->links() }}
    </div>
  </x-card>
@endsection
