@extends('layouts.admin')
@section('title', '仪表盘')

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">总览</h1>
  </div>
  <div class="flex flex-wrap -mx-4 mb-6">
    <div class="w-full md:w-1/3 px-4 mb-4">
      <x-dashboard.card title="用户数" count="{{ $stats['users'] }}" href="{{ route('admin.users.index') }}" href-title="管理用户">
        <x-slot name="icon">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
          </svg>
        </x-slot>
      </x-dashboard.card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <x-dashboard.card title="订阅数" count="{{ $stats['subscriptions'] }}" href="{{ route('admin.subscriptions.index') }}" href-title="管理订阅">
        <x-slot name="icon">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm11 1H6v8l4-2 4 2V6z" clip-rule="evenodd"></path>
          </svg>
        </x-slot>
      </x-dashboard.card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <x-dashboard.card title="方案数" count="{{ $stats['plans'] }}" href="{{ route('admin.plans.index') }}" href-title="管理方案">
        <x-slot name="icon">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path>
          </svg>
        </x-slot>
      </x-dashboard.card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <x-dashboard.card title="分组数" count="{{ $stats['groups'] }}" href="{{ route('admin.card-groups.index') }}" href-title="管理分组">
        <x-slot name="icon">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"></path>
            <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"></path>
          </svg>
        </x-slot>
      </x-dashboard.card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <x-dashboard.card title="卡片数" count="{{ $stats['cards'] }}" href="{{ route('admin.cards.index') }}" href-title="管理卡片">
        <x-slot name="icon">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path>
            <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path>
          </svg>
        </x-slot>
      </x-dashboard.card>
    </div>
    <div class="w-full md:w-1/3 px-4 mb-4">
      <x-dashboard.card title="页面数" count="{{ $stats['pages'] }}" href="{{ route('admin.pages.index') }}" href-title="管理页面">
        <x-slot name="icon">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
          </svg>
        </x-slot>
      </x-dashboard.card>
    </div>
  </div>
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">最近记录</h1>
  </div>
  <div class="flex flex-wrap -mx-4">
    <div class="w-full md:w-1/2 px-4 mb-4">
      <x-card>
        <div class="-m-5">
          <div class=" flex items-center justify-between py-3 px-5">
            <span class="text-gray-900 text-lg">最近注册</span>
          </div>
          <div class="flex flex-col">
            @forelse($newUsers as $user)
              <div class="border-t border-gray-100 py-3 flex items-center">
                <div class="px-5 flex-1">
                  <div class="flex items-center">
                    <div class="mr-3">
                      <img class="h-8 w-8 rounded-full" src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
                    </div>
                    <div class="flex flex-col">
                      <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $user->name }}</a>
                      <span class="text-gray-500">{{ $user->nickname }}</span>
                    </div>
                  </div>
                </div>
                <div class="px-5">
                  <div class="flex items-center space-x-2">
                    <x-button to="{{ route('admin.users.edit', $user) }}" size="text-sm py-1 px-3" class="border-indigo-600 text-indigo-600 bg-transparent hover:text-white hover:bg-indigo-600 focus:ring-indigo-600">编辑</x-button>
                  </div>
                </div>
              </div>
            @empty
              <div class="px-5 py-6 border-t border-gray-100 text-gray-500 text-center">暂无数据。</div>
            @endforelse
          </div>
        </div>
      </x-card>
    </div>
    <div class="w-full md:w-1/2 px-4 mb-4">
      <x-card>
        <div class="-m-5">
          <div class=" flex items-center justify-between py-3 px-5">
            <span class="text-gray-900 text-lg">最近订阅</span>
          </div>
          <div class="flex flex-col">
            @forelse($newSubscriptions as $subscription)
              <div class="border-t border-gray-100 py-3 flex items-center">
                <div class="px-5 flex-1">
                  <div class="flex items-center">
                    <div class="mr-3">
                      <img class="h-8 w-8 rounded-full" src="{{ $subscription->user->avatar_url }}" alt="{{ $subscription->user->name }}">
                    </div>
                    <div class="flex flex-col">
                      <a href="{{ route('admin.users.edit', $subscription->user) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">{{ $subscription->user->name }}</a>
                      <span class="text-gray-500 text-sm">{{ $subscription->plan->name }}</span>
                    </div>
                  </div>
                </div>
                <div class="px-5">
                  <div class="flex items-center space-x-2">
                    <x-button to="#" size="text-sm py-1 px-3" class="border-gray-800 text-gray-800 bg-transparent hover:text-white hover:bg-gray-800 focus:ring-gray-800">详情</x-button>
                  </div>
                </div>
              </div>
            @empty
              <div class="px-5 py-6 border-t border-gray-100 text-gray-500 text-center">暂无数据。</div>
            @endforelse
          </div>
        </div>
      </x-card>
    </div>
  </div>

@endsection
