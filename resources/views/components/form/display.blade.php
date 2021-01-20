<div class="mb-5">
  @if($label ?? null)
    <label for="{{ $name }}" class="form-label block mb-1 font-semibold text-gray-700">
      {{ $label }}
    </label>
  @endif

  <div class="flex rounded-md shadow-sm">
    <input type="hidden" name="{{ $name }}" value="{{ $value ?? '' }}">
    <div class="flex-1">
      <div class="relative">
        <div class="bg-gray-100 w-full rounded-md leading-normal px-3 py-2 text-base border border-gray-300">{{ $value ?? '' }}</div>
      </div>
    </div>
  </div>

  @isset($hint)
    <div class="text-sm text-gray-500 my-2 leading-tight">{!! $hint !!}</div>
  @endisset
</div>
