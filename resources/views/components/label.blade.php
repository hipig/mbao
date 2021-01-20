@props(['type' => 'default'])

@php
  $customClasses = [
    'default' => 'text-gray-800 bg-gray-100',
    'primary' => 'text-indigo-800 bg-indigo-100',
    'info' => 'text-blue-800 bg-blue-100',
    'success' => 'text-green-800 bg-green-100',
    'warning' => 'text-yellow-800 bg-yellow-100',
    'danger' => 'text-red-800 bg-red-100',
  ];
@endphp

<span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none {{ $customClasses[$type] }}">{{ $slot }}</span>
