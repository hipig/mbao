@extends('layouts.admin')
@section('title', '页面')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '页面'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">页面</h1>
    <x-button to="{{ route('admin.pages.create') }}" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">添加</x-button>
  </div>
  <x-card title="页面列表">
    <div class="-m-5">
      <table class="table-fixed w-full">
        <thead>
        <tr>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">名称</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">标识</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">状态</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">创建时间</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pages as $page)
          <tr>
            <td class="px-5 py-3 border-b border-gray-100">
              <a href="{{ route('admin.pages.show', $page) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $page->name }}</a>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">{{ $page->key }}</td>
            <td class="px-5 py-3 border-b border-gray-100">
              @if($page->status)
                <x-label type="success">启用</x-label>
              @else
                <x-label type="danger">禁用</x-label>
              @endif
            </td>
            <td class="px-5 py-3 border-b border-gray-100">{{ $page->created_at }}</td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center space-x-2">
                <x-button to="{{ route('admin.pages.show', $page) }}" size="text-sm py-1 px-3" class="border-gray-800 text-gray-800 bg-transparent hover:text-white hover:bg-gray-800 focus:ring-gray-800">详情</x-button>
                <x-button to="{{ route('admin.pages.edit', $page) }}" size="text-sm py-1 px-3" class="border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600">编辑</x-button>
                <div x-data="{action: '{{ route("admin.pages.destroy", $page) }}'}">
                  <x-button size="text-sm py-1 px-3" class="border-red-600 text-red-600 bg-transparent hover:text-white hover:bg-red-600 focus:ring-red-600" x-on:click="$dispatch('open-delete-modal', {action})">删除</x-button>
                </div>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-5 py-10 text-gray-500 text-center">暂无数据。</td>
          </tr>
        @endforelse
        </tbody>
      </table>
      <div class="px-5 py-2">
        {{ $pages->links('admin.partials.pagination') }}
      </div>
      <x-table.action-delete title="删除页面" content="请确认是否删除页面？"></x-table.action-delete>
    </div>
  </x-card>
@endsection
