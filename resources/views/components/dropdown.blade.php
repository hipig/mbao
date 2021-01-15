@props(['align' => 'right'])

@php
  $alignClasses = [
      'left' => 'left-0',
      'right' => 'right-0',
  ];
@endphp

<div x-data="{ open: false }" class="relative" x-cloak>
  <div x-on:click="open = ! open" class="cursor-pointer leading-none">
    {{ $slot }}
  </div>

  <div
    x-show="open"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    @click.away="open = false"
    class="absolute {{ $alignClasses[$align] }} z-20  mt-2"
  >
    {{ $menu }}
  </div>
</div>
