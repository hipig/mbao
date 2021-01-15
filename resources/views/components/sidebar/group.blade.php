<div class="mt-3">
  @if($title ?? null)
    <div class="text-gray-500 text-xs uppercase font-semibold tracking-wide px-2">{{ $title }}</div>
  @endif
  <div class="flex flex-col">
    {{ $slot }}
  </div>
</div>
