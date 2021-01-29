<div class="flex flex-col">
  @if($label ?? null)
    <label
      for="{{ $for ?? '' }}"
      {{ $attributes->merge([
        'class' => 'block mb-1 text-gray-700 font-semibold'
      ])}}
    >
      {{ $label }}
    </label>
  @endif
  {{ $slot }}
</div>
