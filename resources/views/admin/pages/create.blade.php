@extends('layouts.admin')
@section('title', '添加页面')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '页面' => route('admin.pages.index'),
      '添加'
    ]
  ])
@endsection

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl text-gray-900">添加页面</h1>
  </div>
  <x-card>
    <x-form action="{{ route('admin.pages.store') }}" class="space-y-5">
      <x-form.input label="名称" name="name" placeholder="请输入名称"></x-form.input>
      <x-form.input label="标识" name="key" placeholder="请输入标识"></x-form.input>
      <x-form.quill-editor label="内容" name="content" placeholder="请输入内容"></x-form.quill-editor>
      <x-form.switch label="状态" name="status" :value="true"></x-form.switch>
      <div class="flex items-center justify-between">
        <x-button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-500 focus:ring-indigo-600">保存</x-button>
      </div>
    </x-form>
  </x-card>
@endsection
