@props(['type' => 'default'])

@php
  $customClasses = [
    'default' => 'text-gray-800 bg-gray-100',
    'indigo' => 'text-indigo-800 bg-indigo-100',
    'green' => 'text-green-800 bg-green-100',
    'red' => 'text-red-800 bg-red-100',
  ];
@endphp

<span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none {{ $customClasses[$type] }}">{{ $slot }}</span>
