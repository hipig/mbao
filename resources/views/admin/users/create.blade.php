@extends('layouts.admin')
@section('title', '编辑方案')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '用户' => route('admin.users.index'),
      '添加'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">添加用户</h1>
  </div>
  <x-card>
    <x-form action="{{ route('admin.users.store') }}">
      <x-form.input label="昵称" name="name" placeholder="请输入昵称"></x-form.input>
      <x-form.input label="邮箱地址" name="email" placeholder="请输入邮箱地址"></x-form.input>
      <x-form.input type="password" label="密码" name="password" placeholder="请输入密码">
        <x-slot name="left">
          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
          </span>
        </x-slot>
      </x-form.input>
      <x-form.input type="password" label="确认密码" name="password_confirmation" placeholder="请输入确认密码">
        <x-slot name="left">
          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
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
