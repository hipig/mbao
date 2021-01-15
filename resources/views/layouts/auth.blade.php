@extends('layouts.main')
@section('title', '仪表盘')

@section('body')
  <div id="app" class="min-h-screen flex items-center">
    @yield('content')
  </div>
@endsection
