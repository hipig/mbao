@props(['to', 'type', 'name', 'size'])

@if($to ?? null)
  <a href="{{ $to }}"
    {{ $attributes->merge([
      'class' => 'inline-flex items-center justify-center border border-transparent shadow-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 ' . ($size ?? 'py-2 px-5 leading-snug')
    ])}}>
    {{ $slot }}
  </a>
@else
  <button
    type="{{ $type ?? 'button' }}"
    name="{{ $name ?? '' }}"
    {{ $attributes->merge([
      'class' => 'inline-flex items-center justify-center border border-transparent shadow-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 ' . ($size ?? 'py-2 px-5 leading-snug')
    ])}} x-on:click="console.log('111')">
    {{ $slot }}
  </button>
@endif
