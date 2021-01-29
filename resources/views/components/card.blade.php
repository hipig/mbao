<div class="relative bg-white rounded-md shadow overflow-x-auto">
  @if($title ?? null)
    <div class="border-b border-gray-100 flex items-center justify-between px-5 py-3">
      <span class="text-gray-900 text-lg">{{ $title }}</span>
      {{ $action ?? '' }}
    </div>
  @endif
  <div class="p-5">
    {{ $slot }}
  </div>
</div>
