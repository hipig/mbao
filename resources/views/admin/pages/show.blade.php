@extends('layouts.admin')
@section('title', '页面详情')

@section('breadcrumb')
  @include('admin.partials.breadcrumb', [
    'links' => [
      '仪表盘' => route('admin.dashboard'),
      '页面' => route('admin.pages.index'),
      '详情'
    ]
  ])
@endsection

@section('content')
  <x-card title="{{ $page->name }}">
    <div class="prose">
      {!! $page->content !!}
    </div>
  </x-card>
@endsection
