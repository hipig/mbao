<div class="bg-white rounded-md shadow-sm overflow-hidden">
  <div class="flex justify-between items-start p-5">
    <div class="flex-1 flex flex-col">
      <div class="mb-2 font-medium truncate text-gray-400">{{ $title }}</div>
      <div class="text-4xl text-gray-900 truncate">{{ $count ?? 0 }}</div>
    </div>
    @if($icon ?? null)
      <div class="text-indigo-600 bg-indigo-50 rounded-lg p-2">
        {{ $icon }}
      </div>
    @endif
  </div>
  <div class="bg-gray-50 py-3 px-4">
    <a href="{{ $href ?? 'javascript:;' }}" class="flex items-center text-gray-400">
      <span class="mr-1">{{ $hrefTitle ?? '' }}</span>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    </a>
  </div>
</div>
