<div class="flex flex-col">
  <x-form-label label="{{ $label ?? null }}" for="{{ $name }}" class="{{ $labelClass ?? '' }}"></x-form-label>

  <div class="flex rounded-md shadow-sm">
    <input type="hidden" name="{{ $name }}" value="{{ $value ?? '' }}">
    <div class="flex-1">
      <div class="relative">
        <div
          {{ $attributes->merge([
            'class' => 'bg-gray-100 w-full rounded-md leading-normal px-3 py-2 text-base border border-gray-300'
          ])}}
        >
          {{ $value ?? '' }}
        </div>
      </div>
    </div>
  </div>

  @isset($hint)
    <div class="text-sm text-gray-500 mt-2 leading-tight">{!! $hint !!}</div>
  @endisset
</div>
