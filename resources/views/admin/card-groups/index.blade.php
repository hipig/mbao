@extends('layouts.admin')
@section('title', '卡片分组')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '卡片分组'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">卡片分组</h1>
    <x-button to="{{ route('admin.card-groups.create') }}" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">添加</x-button>
  </div>
  <x-card title="卡片分组列表">
    <div class="-m-5">
      <table class="w-full whitespace-nowrap border-collapse">
        <thead>
        <tr>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">名称</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">颜色样式</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">是否付费</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">卡片数</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">状态</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cardGroups as $cardGroup)
          <tr>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex">
                <div class="flex-1">
                  <div class="flex flex-col">
                    <a href="{{ route('admin.card-groups.edit', $cardGroup) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $cardGroup->name }}</a>
                    <span class="text-gray-500">{{ $cardGroup->name_en }}</span>
                  </div>
                </div>
              </div>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="rounded-full w-5 h-5 {{ 'bg-' . $cardGroup->color . '-600' }}"></div>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($cardGroup->is_pro)
                <x-label type="warning">付费</x-label>
              @else
                <x-label>免费</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              <span class="text-gray-900 font-semibold">{{ $cardGroup->cards_count }}</span>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($cardGroup->status)
                <x-label type="success">启用</x-label>
              @else
                <x-label type="danger">禁用</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center space-x-2">
                <x-button to="{{ route('admin.card-groups.edit', $cardGroup) }}" size="text-sm py-1 px-3" class="border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600">编辑</x-button>
                <div x-data="{action: '{{ route("admin.card-groups.destroy", $cardGroup) }}'}">
                  <x-button size="text-sm py-1 px-3" class="border-red-600 text-red-600 bg-transparent hover:text-white hover:bg-red-600 focus:ring-red-600" x-on:click="$dispatch('open-delete-modal', {action})">删除</x-button>
                </div>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-5 py-10 text-gray-500 text-center">暂无数据。</td>
          </tr>
        @endforelse
        </tbody>
      </table>
      <div class="px-5 py-4">
        {{ $cardGroups->links('admin.partials.pagination') }}
      </div>
      <x-table.action-delete title="删除卡片分组" content="删除分组，将同时删除分组下的卡片"></x-table.action-delete>
    </div>
  </x-card>
@endsection
