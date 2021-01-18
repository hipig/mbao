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
  </div>
  <div class="bg-white rounded-md shadow-sm overflow-hidden">
    <div class="border-b border-gray-100 flex items-center justify-between px-5 py-3">
      <span class="text-gray-800">方案列表</span>
    </div>
    <div class="h-64"></div>
  </div>
@endsection
