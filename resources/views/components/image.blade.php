@if($src)
  <div {{ $attributes->merge([
    'class' => 'inline-flex items-center justify-center relative overflow-hidden'
  ])}}>
    <img class="align-top w-full h-full" src="{{ $src }}" alt="{{ $alt ?? '' }}" style="object-fit: {{ $fit ?? 'fill' }}">
  </div>
@else
  <div {{ $attributes->merge([
    'class' => 'inline-flex items-center justify-center relative overflow-hidden bg-gray-100'
  ])}}>
    <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
    </svg>
  </div>
@endif
