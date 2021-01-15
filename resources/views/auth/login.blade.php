@extends('layouts.auth')
@section('title', '登录')

@section('content')
  <div class="w-full md:max-w-lg md:mx-auto p-4 my-4">
    <div class="flex justify-center">
      <h2 class="flex items-center mb-6 text-center text-3xl text-gray-900">
        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
        </svg>
        <span class="ml-3">欢迎回来</span>
      </h2>
    </div>
    <div class="bg-white rounded-md shadow-sm overflow-hidden">
      <div class="flex flex-col">
        <div class="py-8 px-4 md:px-10">
          <x-form action="{{ route('login') }}">
            <x-form.input label="邮箱地址" name="email" placeholder="请输入邮箱地址"></x-form.input>
            <x-form.input label="密码" type="password" name="password" placeholder="请输入密码"></x-form.input>
            <div class="mb-6 flex items-center justify-between">
              <x-form.checkbox name="remember" :value="true">记住我</x-form.checkbox>
            </div>
            <x-button type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-700">登录</x-button>
          </x-form>
        </div>
      </div>
    </div>
  </div>
@endsection
