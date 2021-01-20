@extends('layouts.main')
@section('title', '仪表盘')

@section('body')
  <div id="app" class="min-h-screen flex">
    @include('admin.partials.sidebar')

    <main class="flex flex-col w-0 flex-1 overflow-hidden">
      @include('admin.partials.header')
      <div class="w-full md:max-w-6xl md:mx-auto py-8 px-4 sm:px-6 md:px-8 py-4">
        @yield('breadcrumb')
        @include('admin.partials.alert')
        @yield('content')
      </div>
    </main>
  </div>
@endsection
