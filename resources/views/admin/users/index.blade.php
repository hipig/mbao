@extends('layouts.admin')
@section('title', '方案')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '用户'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">用户</h1>
    <x-button to="{{ route('admin.users.create') }}" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">添加</x-button>
  </div>
  <x-card title="用户列表">
    <div class="-m-5">
      <table class="table-fixed w-full">
        <thead>
        <tr>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">昵称</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">邮箱地址</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">注册时间</th>
          <th class="px-5 py-2 text-sm bg-gray-50 text-gray-900 text-left font-semibold border-b border-gray-100">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
          <tr>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center">
                <div class="mr-3">
                  <img class="h-6 w-6 rounded-full" src="{{ Avatar::create($user->name)->toBase64() }}" alt="{{ $user->name }}">
                </div>
                <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $user->name }}</a>
              </div>
            </td>
            <td class="px-5 py-3 border-b border-gray-100">{{ $user->email }}</td>
            <td class="px-5 py-3 border-b border-gray-100">{{ $user->created_at }}</td>
            <td class="px-5 py-3 border-b border-gray-100">
              <div class="flex items-center space-x-2">
                <x-button to="{{ route('admin.users.edit', $user) }}" size="text-sm py-1 px-3" class="border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600">编辑</x-button>
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
      <div class="px-5 py-2">
        {{ $users->links('admin.partials.pagination') }}
      </div>
    </div>
  </x-card>
@endsection
