@if(isset($to))
  <a href="{{ $to }}"
    {{ $attributes->merge([
      'class' => 'inline-flex items-center justify-center py-2 px-5 border border-transparent shadow-sm leading-snug font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2'
    ])}}>
    {{ $slot }}
  </a>
@else
  <button
    type="{{ $type ?? 'button' }}"
    name="{{ $name ?? '' }}"
    {{ $attributes->merge([
      'class' => 'inline-flex items-center justify-center py-2 px-5 border border-transparent shadow-sm leading-snug font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2'
    ])}}>
    {{ $slot }}
  </button>
@endif
